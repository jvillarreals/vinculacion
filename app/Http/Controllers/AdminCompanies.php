<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Hash;
// models
use App\User;
use App\models\Company;


// FormValidators
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\SaveCompanyRequest;
class AdminCompanies extends Controller
{
  /*
  * E M P R E S A S
  * ----------------------------------------------------------------
  */

  public function view($id){
    $user    = Auth::user();
    $company = Company::with('user')->find($id);

    return view("admin.companies.company-profile")->with([
      "user"  => $user,
      "company" => $company
    ]);
  }

  public function add(){
    $user    = Auth::user();

    return view("admin.companies.company-add")->with([
      "user"  => $user,
    ]);

  }

  public function save(SaveCompanyRequest $request){

    // [1] crea el usuario
    $user = new User([
      'name'    => $request->name,
      'email'   => $request->email,
      'type'    => 'company',
      'enabled' => 1
    ]);
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }

    $user->save();

    // [2] envía el correo de suscripción
    $path = base_path();
    exec("php {$path}/artisan email:send suscribe {$user->id} > /dev/null &");

    // [3] se crea el objeto empresa
    $company = $user->company()->firstOrCreate([]);
    $company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','size']));
    $company->contact()->firstOrCreate([]);
    $company->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);
    // send to view
    return redirect("dashboard/empresa/{$user->id}");
  }

  public function edit($id){
    // [1] el usuario del sistema
    $user = Auth::user();
    // [2] el usuario a editar
    $company  = User::with("company.contact")->find($id);
    // [3] el view para editar
    return view("admin.companies.company-update")->with([
      "user" => $user,
      "company"  => $company
    ]);

  }

  public function update(UpdateCompanyRequest $request, $id){
    $user = User::find($id);
    $old_email = $user->email;

    // update user
    $user->name  = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
      $user->password = Hash::make($request->password);
    }
    $user->save();

    // send email if distinct
    if($user->email != $old_email){
      $path = base_path();
      exec("php {$path}/artisan email:send new_email {$user->id} > /dev/null &");
    }

    // update company
    $user->company->update($request->only(['rfc', 'razon_social', 'nombre_comercial', 'address', 'zip', 'phone','email','giro_comercial','alcance','type','size']));

    // update company contact
    $user->company->contact->update([
      "name"  => $request->cname,
      "email" => $request->cemail,
      "phone" => $request->cphone,
    ]);

    // send to view
    return redirect("dashboard/empresa/{$id}");

  }

  public function delete($id){
    $user     = User::find($id);
    $user->company->contact->delete();
    $user->company->delete();
    $user->delete();
    return redirect('dashboard/empresas');

  }

  public function search(Request $request){
      $member = $request->match;
      $results = User::where('name', 'like', "$member%")
                ->where('type','company')
                 ->orwhere('email','like',"$member%")->get();
      if($results->isempty()){
        $results = Company::where('razon_social', 'like', "$member%")
                   ->orwhere('nombre_comercial','like',"$member%")->get();
        if($results->isempty()){
                   return ['false'];
        }else{
          $temp = array();
          foreach($results as $result){
            $company  = User::with("company.contact")->find($result->user_id);
            $temp[] = $company;
          }
           return response()->json($results)->header('Access-Control-Allow-Origin', '*');
        }
      }else{
        $temp = array();
        foreach($results as $result){
          $company  = User::with("company.contact")->find($result->id);
          $temp[] = $company;
        }
        return response()->json($temp)->header('Access-Control-Allow-Origin', '*');
      }


  }

  public function enableToogle($id){
    $company = User::find($id);
    $company->enabled = ! $company->enabled;
    $company->save();

    return redirect("dashboard/empresa/{$id}");
  }
}
