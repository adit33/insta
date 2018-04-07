<?php

namespace App\DataTables;

use App\Models\InstaAccount;
use Yajra\DataTables\Services\DataTable;
use Form;
class InstaAccountDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action',function($query){
                return '<a class="btn btn-primary btn-xs" href="'.route('instaaccount.edit',$query->id).'">Edit</a>' .Form::open([
                "method" => "DELETE",
                "id"     =>"form-delete",
                "route"  => ["instaaccount.destroy", $query->id],
                "style"  => "display:inline"
                ])
                .Form::submit('Delete',['class'=>'btn btn-danger btn-xs js-submit-confirm']).'';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InstaAccount $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InstaAccount $model)
    {
        return $model->select('*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'user_id',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'InstaAccount_' . date('YmdHis');
    }
}
