<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('products.product');
    }
}
