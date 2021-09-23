<?php

namespace App\DataTables;

use App\Models\Activity;
use Spatie\Activitylog\Models\Activity as ModelsActivity;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ActivityDataTable extends DataTable
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
            ->editColumn('properties','activity.prop')
            ->rawColumns(['properties']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ModelsActivity $model)
    {
        return $model->newQuery()->select([
            'id', 'log_name', 'causer_id', 'description', 'properties'
        ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('activity-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('excel'),
                Button::make('reload')
            )->parameters([
                "initComplete" => "function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement('input');
                        $(input).attr('placeholder','Değer girin..');
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? val : '', true, false).draw();
                        });
                    });
                }",
            ]);;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('log_name'),
            Column::make('causer_id'),
            Column::make('description'),
            Column::make('properties'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Activity_' . date('YmdHis');
    }
}
