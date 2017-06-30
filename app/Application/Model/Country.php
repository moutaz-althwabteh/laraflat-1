<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

  public $table = "country";


   protected $fillable = [
        'name'
   ];
    public $timestamps = false;
   public function validation($id){
        return [
            'name'=>'required|unique:country'
        ];
   }

   public function updateValidation($id){
           return [
               'name'=>'required|unique:country.name,'.$id
           ];
   }

}
