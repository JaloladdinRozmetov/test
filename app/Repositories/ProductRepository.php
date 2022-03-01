<?php


namespace App\Repositories;


use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Str;

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
        $nameImage = $request->file('image')->store('public/products');
        $nameImage = ltrim($nameImage, 'public');
        $data = [
            'product_name' => $request->product_name,
            'sku_code' => Str::random(5).rand(0, 9),
            'price' => $request->price,
            'admin_created_id' => auth()->id(),
            'admin_updated_id' => auth()->id(),
            'image'=>$nameImage,
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
     * @param UpdateRequest $request
     * @param int $id
     * @return array
     */
    public function update(UpdateRequest $request, $id):array
    {
        $item = Product::query()->findOrFail($id);
        $nameImage = $item->image;

        if ($request->file('image')) {
            $nameImage = $request->file('image')->store('public/products');

            $nameImage = ltrim($nameImage, 'public');
            $item->image = $nameImage;
        }
        $data = [
            'product_name' => $request->product_name,
            'price' => $request->price,
            'admin_updated_id' => auth()->id(),
            'image' => $nameImage,
        ];
        $item->update($data);
        return [
            'id_items' => $item,
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy($id):bool
    {
        $delete = Product::findOrFail($id);
        $delete->save();


        return $delete->delete();

    }

}
