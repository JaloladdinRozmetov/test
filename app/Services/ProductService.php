<?php


namespace App\Services;


use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    /**
     * @var ProductRepository
     */
    protected $product;

    /**
     * product Service constructor.
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        $result = $this->product->store($data);

        return $result;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id):array
    {
        $result = $this->product->update($request,$id);

        return $result;
    }
    /**
     * Get product  by ID
     * @param $id
     * @return mixed
     */
    public function edit($id):object
    {
        return $this->product->edit($id);
    }

    /**
     * Delete product  by ID
     * @param $id
     * @return mixed
     */
    public function destroy($id):bool
    {
        return $this->product->destroy($id);
    }


}
