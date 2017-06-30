<?php

namespace App\Application\DataTables;

use App\Application\Model\Advertisement;
use Yajra\Datatables\Services\DataTable;

class AdvertisementsDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
             ->eloquent($this->query())
             ->addColumn('edit', 'admin.advertisement.buttons.edit')
             ->addColumn('delete', 'admin.advertisement.buttons.delete')
             ->addColumn('view', 'admin.advertisement.buttons.view')
             ->addColumn('name', 'admin.advertisement.buttons.langcol')
            ->addColumn('image', 'admin.advertisement.buttons.image')

            ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Advertisement::query();
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                'dom'          => 'Bfrtip',
                'buttons'      => ['excel', 'print','reset','reload']//, 'reset', 'reload'

            ]);
        if(getCurrentLang() == 'ar'){
            $html = $html->parameters([
                'language' => [
                    'url' => url('/vendor/datatables/arabic.json')
                ]
            ]);
        }
        return $html;
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
              [
                  'name' => "id",
                  'data' => 'id',
                  'title' => adminTrans('curd' , 'id'),
             ],
             [
                'name' => "name",
                'data' => 'name',
                'title' => adminTrans('advertisement' , 'name'),
             ],
            [
                'name' => "category_id",
                'data' => 'category_id',
                'title' => adminTrans('advertisement' , 'category_id'),
            ],
            [
                'name' => "start_adv",
                'data' => 'start_adv',
                'title' => adminTrans('advertisement' , 'start_adv'),
            ],
            [
                'name' => "end_adv",
                'data' => 'end_adv',
                'title' => adminTrans('advertisement' , 'end_adv'),
            ],
            [
                'name' => "image",
                'data' => 'image',
                'title' => adminTrans('advertisement' , 'image'),
            ],

             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => adminTrans('curd' , 'view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  adminTrans('curd' , 'edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => adminTrans('curd' , 'delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Advertisementdatatables_' . time();
    }
}