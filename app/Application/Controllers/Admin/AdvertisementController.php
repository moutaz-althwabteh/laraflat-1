<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use App\Application\DataTables\AdvertisementsDataTable;
use App\Application\Model\Advertisement;
use Yajra\Datatables\Request;
use Alert;

class AdvertisementController extends AbstractController
{
    public function __construct(Advertisement $model)
    {
        parent::__construct($model);
    }

    public function index(AdvertisementsDataTable $dataTable){
        return $dataTable->render('admin.advertisement.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.advertisement.edit' , $id);
    }

    public function store($id = null , \Illuminate\Http\Request $request){
         return $this->storeOrUpdate($request , $id , 'admin/advertisement');
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.advertisement.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/advertisement')->with('sucess' , 'Done Delete advertisement From system');
    }
}
