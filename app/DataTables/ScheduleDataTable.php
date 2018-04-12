<?php

namespace App\DataTables;

use App\Models\Schedule;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Storage;
use Form;
class ScheduleDataTable extends DataTable
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
        ->editColumn('photo',function($query){
            return '<img src="'.asset('img/'.$query->photo).'" style="width: 128px; height: 128px;"></img>';
        })
            ->addColumn('action', function($query){
                return '<button class="btn btn-xs btn-primary" href="'.route('schedule.edit',$query->id).'">Edit</button>'
                   .Form::open([
                "method" => "DELETE",
                "id"     =>"form-delete",
                "route"  => ["schedule.destroy", $query->id],
                "style"  => "display:inline"
                ])
                .Form::submit('Delete',['class'=>'btn btn-sm btn-danger js-submit-confirm']).'';;
            })
            ->rawColumns(['photo','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Schedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Schedule $model)
    {
        return $model->with('instaAccount')->select('*');
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
            'insta_account_id'=>['data'=>'insta_account.user_id','name'=>'instaAccount.user_id'],
            'photo',
            'time'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Schedule_' . date('YmdHis');
    }
}
