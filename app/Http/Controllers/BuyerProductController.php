<?php

namespace App\Http\Controllers;


use App\Http\Requests\buyProduct\BuyProductRequest;
use App\Models\Product;
use App\Services\BuyProductService;
use Illuminate\Http\RedirectResponse;

class BuyerProductController extends Controller
{

    protected $buyProduct;

    public function __construct(BuyProductService $buyProduct)
    {
        $this->buyProduct = $buyProduct;
    }

    public function index($id)
    {
        $buyer_id = $id;
        $products = Product::query()->paginate(20);
        return view('buy-product',compact('buyer_id','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BuyProductRequest $request
     * @return RedirectResponse
     */
    public function store(BuyProductRequest $request):RedirectResponse
    {

        $this->buyProduct->store($request);

        return redirect()->route("buyer-product.index", ['id' => $request->buyer_id])->with('success','Data added successfully');

    }

}
