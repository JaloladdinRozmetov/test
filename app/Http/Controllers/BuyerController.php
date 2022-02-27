<?php

namespace App\Http\Controllers;

use App\DataTables\BuyerDataTable;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index(BuyerDataTable $dataTable)
    {
        return $dataTable->render('buyers.buyer');
    }
}
