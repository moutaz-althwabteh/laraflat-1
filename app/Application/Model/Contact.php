<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

  public $table = "contact";


   protected $fillable = [
    'name','email','massage'
   ];
   public $timestamps=false;

   public function validation($id){
        return [
            'name'=>'required|min:3|max:100',
            'email'=>'required|email',
            'massage'=>'required|min:10|max:500'
        ];
   }

   public function updateValidation($id){
           return [
               'name'=>'required|min:3|max:100',
               'email'=>'required|email',
               'massage'=>'required|min:10|max:500'
           ];
   }

}
