<?php


namespace App\Repositories;


use App\Http\Requests\buyProduct\BuyProductRequest;
use App\Models\BuyerProduct;

class BuyProductRepository
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  BuyProductRequest $request
     * @return array
     */
    public function store($request):array
    {
        $data = [
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
        ];
        $items   = BuyerProduct::create($data);
        return [
            'items'   => $items,
        ];
    }
}
