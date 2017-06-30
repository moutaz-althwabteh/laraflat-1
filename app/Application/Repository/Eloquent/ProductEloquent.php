<?php
namespace App\Application\Repository\Eloquent;

use App\Application\Model\Categorie;
use App\Application\Model\Country;

use App\Application\Model\Product;

use App\Application\Model\State;
use App\Application\Model\User;
use App\Application\Repository\InterFaces\GroupInterface;
use App\Application\Repository\InterFaces\ProducrInterface;
use App\Application\Repository\InterFaces\ProductInterface;


class ProductEloquent extends AbstractEloquent implements ProductInterface {

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
    public function getData($id){
        if($id !=null){
            $item=$this->model->find($id);
            $state=transformSelect(State::where('country_id','=',$item->country_id)->pluck('name','id')->all());
        }else
        {
            $state=[];
        }
        $data=[

            'country'=>transformSelect(Country::pluck('name','id')->all()),
            'state'=>$state,
            'cat_id'=>transformSelect(Categorie::pluck('name','id')->all()),
            'user_id'=>User::pluck('name','id')->all()
        ];
        return $data;
    }




}