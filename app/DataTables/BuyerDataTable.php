<?php

namespace App\DataTables;

use App\Models\Buyer;
use App\Models\BuyerProduct;
use Yajra\DataTables\{DataTableAbstract, Html\Builder, Services\DataTable};

class BuyerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('image', function ($artist) {
                $url= asset('storage/'.$artist->image);
                return "<img src='{$url}' border='0' width='40' height='40' class='img-rounded' align='center' />";})
            ->addColumn('count', function (Buyer $buyer) {
                return $buyer->buyerProducts->map(function (BuyerProduct $buyerProduct) {
                    return $buyerProduct->products->id;
                })->count();
            })
            ->addColumn('price', function (Buyer $buyer) {
                return $buyer->buyerProducts->map(function (BuyerProduct $buyerProduct) {
                    return $buyerProduct->products->price;
                })->sum();
            })
            ->addColumn('action', function($row)
            {
                $urlDelete = route('buyer.destroy',['id' => $row->id]);
                $urlUpdate = route("buyer.edit", ['id' => $row->id]);
                $urlProduct = route("buyer-product.index", ['id' => $row->id]);
                return "<a href='{$urlProduct}' class='edit btn btn-primary btn-sm'><i class='fa fa-plus-circle'></i></a>
                        <a href='{$urlUpdate}' class='edit btn btn-success btn-sm'>Edit</a>
                        <a href='{$urlDelete}' class='delete btn btn-danger btn-sm'>Delete</a>";
            })
            ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Buyer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Buyer $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->query()->with('buyerProducts');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
                    ->setTableId('buyer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'phone_number',
            'email',
            'image',
            "price",
            "count",
            'action',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Buyer_' . date('YmdHis');
    }
}
