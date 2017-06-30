<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

  public $table = "state";


   protected $fillable = [
       'name','country_id'

   ];
    public $timestamps = false;
   public function validation($id){
        return [
            'name'=>'required|unique:state',
            'country_id'=>'required'
        ];
   }

   public function updateValidation($id){
           return [
               'name'=>'required|unique:state,name,'.$id,
               'country_id'=>'required'
           ];
   }

    public function country()
    {
        return $this->belongTo( '\App\Application\Model\Country','country_id');
   }

}
