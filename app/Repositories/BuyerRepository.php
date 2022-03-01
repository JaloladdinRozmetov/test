<?php


namespace App\Repositories;


use App\Http\Requests\buyer\CreateRequest;
use App\Http\Requests\buyer\UpdateRequest;
use App\Models\Buyer;
use Illuminate\Support\Str;


class BuyerRepository
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
            'first_name' => $request->first_name,
            'code' => rand(1000000000,9999999999),
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' =>$request->phone_number,
            'admin_created_id' => auth()->id(),
            'admin_updated_id' => auth()->id(),
            'image'=>''
        ];
        $items   = Buyer::create($data);
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
        $item = Buyer::findOrFail($id);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  int  $id
     * @return array
     */
    public function update($request, $id):array
    {
        $item = Buyer::findOrFail($id);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
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
        $delete = Buyer::findOrFail($id);
        $delete->save();


        return $delete->delete();;

    }

}
