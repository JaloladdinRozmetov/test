<?php


namespace App\Services;


use App\Models\Buyer;
use App\Repositories\BuyerRepository;

class BuyerService
{
    /**
     * @var BuyerRepository
     */
    protected $buyer;

    /**
     * buyer Service constructor.
     * @param BuyerRepository $buyer
     */
    public function __construct(BuyerRepository $buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        $result = $this->buyer->store($data);

        return $result;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id):array
    {
        $result = $this->buyer->update($request,$id);

        return $result;
    }
    /**
     * Get buyer  by ID
     * @param $id
     * @return mixed
     */
    public function edit($id):object
    {
        return $this->buyer->edit($id);
    }

    /**
     * Delete buyer  by ID
     * @param $id
     * @return mixed
     */
    public function destroy($id):bool
    {
        return $this->buyer->destroy($id);
    }


}
