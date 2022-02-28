<?php


namespace App\Repositories;


use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return array
     */
    public function store($request):array
    {
        $data = [
            'product_name' => $request->product_name,
            'sku_code' => '',
            'price' => $request->price,
            'admin_created_id' => auth()->id(),
            'admin_updated_id' => auth()->id(),
            'image'=>''
        ];
        $items   = Product::create($data);
        return [
            'items'   => $items,
        ];
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return object
     */
    public function edit($id):object
    {
        $item = Product::findOrFail($id);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return array
     */
    public function update($request, $id):array
    {
        $item = Product::findOrFail($id);

        $data = [
            'product_name' => $request->product_name,
            'sku_code' => $request->sku_code,
            'price' => $request->price,
            'admin_updated_id' => auth()->id(),
        ];
        $item->update($data);
        return [
            'id_items' => $item,
        ];
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return object
     */
    public function destroy($id):bool
    {
        $delete = Product::findOrFail($id);
        $delete->save();


        return $delete->delete();;

    }

}
