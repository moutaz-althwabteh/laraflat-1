<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

  public $table = "Advertisement";


   protected $fillable = [
    'name','category_id','link','start_adv','end_adv','image','active'
   ];

   public function validation($id){
        return [
//            'category_id'=>'required',
            'name'=>'required',
            'start_adv'=>'required',
            'end_adv'=>'required',
            'image'=>'required|max:1000|mimes:jpg,png,gif'
        ];
   }

   public function updateValidation($id){
           return [
               'name'=>'required',
//               'category_id'=>'required',
               'start_adv'=>'required',
               'end_adv'=>'required',
              'image'=>'max:1000|mimes:jpg,png,gif'
           ];
   }

}
