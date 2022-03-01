<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('image', function ($artist) {
                $url= asset('storage/'.$artist->image);
                return "<img src='{$url}' border='0' width='40' height='40' class='img-rounded' align='center' />";})
            ->addColumn('action', function($row)
            {
                $urlDelete = route('product.destroy',['id' => $row->id]);
                $urlUpdate = route("product.edit", ['id' => $row->id]);
                return "<a href='{$urlUpdate}' class='edit btn btn-success btn-sm'>Edit</a>
                        <a href='{$urlDelete}' class='delete btn btn-danger btn-sm'>Delete</a>";
            })
            ->rawColumns(['image','action']);
             }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
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
            'product_name',
            'sku_code',
            'price',
            'image',
            'action',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
