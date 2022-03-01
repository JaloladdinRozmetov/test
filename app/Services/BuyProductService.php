<?php


namespace App\Services;


use App\Repositories\BuyProductRepository;

class BuyProductService
{
    /**
     * @var BuyProductRepository
     */
    protected $buyProduct;

    /**
     * buyer Service constructor.
     * @param BuyProductRepository $buyProduct
     */
    public function __construct(BuyProductRepository $buyProduct)
    {
        $this->buyProduct = $buyProduct;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        $result = $this->buyProduct->store($data);

        return $result;
    }
}
