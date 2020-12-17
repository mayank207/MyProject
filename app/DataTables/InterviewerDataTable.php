<?php

namespace App\DataTables;

use App\Interviewer;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class InterviewerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('category',function($query){
                return $query->getCategory->name;
            })->addColumn('action', function($query){
                $btn = '<div class="d-flex justify-content-around align-items-center">
                <a href="'.route('admincandidate.show',$query->id).'" class="edit btn"><i class="fa fa-eye text-active"></i></a>';
                $btn = $btn.'<button class="btn deleteCandidate" data-id="'.$query->id.'"><i class="fa fa-trash text-danger"></i></button>';
                $btn = $btn.'<a href="'.route('admincandidate.edit',$query->id).'" class="edit btn"><i class="fa fa-edit text-active"></i></a></div>';
                return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Interviewer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Interview $model)
    {
        if($this->request()->get('id'))
        {
            $id=$this->request()->get('id');
            $query= $model->newQuery();
            $query=$query->where('hr_id',$id);
        }
        else
        {
            $start_date=$this->request()->get('start_date');
            $end_date=$this->request()->get('end_date');
            $query= $model->newQuery();
            if(!empty($start_date) && !empty($end_date))
            {
                $start_date=Carbon::parse($start_date);
                $end_date=Carbon::parse($end_date);
                $query=$query->whereBetween('created_at',[$start_date.' 00:00:00',$end_date.' 23:59:59']);
            }
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('interviewer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'dom'  => 'Bfrtip',
                        'buttons' => ['export'],
                    ]);
    }


    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('category'),
            Column::make('created_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Interviewer_' . date('YmdHis');
    }
}
