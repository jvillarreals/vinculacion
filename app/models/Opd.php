<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
  //
protected $fillable = ["name", "url", "city", "state", "address", "zip"];

  //modelosrelacionados
  function user(){
   return $this->belongsTo("App\User");
  }

  //modelosrelacionados
  function student(){
   return $this->hasMany("App\models\Student");
  }

  //modelosrelacionados
  function contract(){
   return $this->hasMany("App\models\Contract");
  }

    //modelosrelacionados
  function AcademicOffer(){
    return $this->hasMany("App\models\AcademicOffer");
  }

  public function contact()
  {
    return $this->morphMany('App\models\Contact', 'contact');
  }
}
