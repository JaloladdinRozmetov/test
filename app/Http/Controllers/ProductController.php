<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }



    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('products.create',[
            'item'    => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request):RedirectResponse
    {

        $this->product->store($request);

        return redirect()->route('product.index',[
        ])->with('success','Data added successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id):View
    {
        return view('products.edit',[
            'item' => $this->product->edit($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, int $id):RedirectResponse
    {
        $items = $this->product->update($request,$id);

        return redirect()->route('product.index',[
        ])->with('success','Data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id):RedirectResponse
    {
        $this->product->destroy($id);

        return back()->with('success','Data deleted successfully');
    }


}
