<?php

namespace App\Http\Controllers;

use App\DataTables\BuyerDataTable;
use App\Http\Requests\buyer\CreateRequest;
use App\Http\Requests\buyer\UpdateRequest;
use App\Models\Buyer;
use App\Models\BuyerProduct;
use App\Services\BuyerService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class BuyerController extends Controller
{
    protected $buyer;

    public function __construct(BuyerService $buyer)
    {
        $this->buyer = $buyer;
    }



    public function index(BuyerDataTable $dataTable)
    {
//        $a1 = array_map( function($value){return $value['buyer_id'];}, BuyerProduct::query()->select('buyer_id')->get()->toArray());

//        dd(Buyer::query()->whereNotIn('id', $a1)->get());
        return $dataTable->render('buyers.buyer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('buyers.create',[
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
        $items = $this->buyer->store($request);

        return redirect()->route('buyer.index',[
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
        return view('buyers.edit',[
            'item' => $this->buyer->edit($id)
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
        $items = $this->buyer->update($request,$id);

        return redirect()->route('buyer.index',[
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
        $this->buyer->destroy($id);

        return back()->with('success','Data deleted successfully');
    }


}
