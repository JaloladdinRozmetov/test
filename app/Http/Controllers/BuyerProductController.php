<?php

namespace App\Http\Controllers;

use App\DataTables\BuyerProductDataTable;
use Illuminate\Http\Request;

class BuyerProductController extends Controller
{
    public function index(BuyerProductDataTable $dataTable)
    {
        return $dataTable->render('buyer-products.buyer-product');
    }
}
