<?php


namespace App\Http\Requests\buyProduct;


use Illuminate\Foundation\Http\FormRequest;

class BuyProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required'],
            'buyer_id' => ['required'],
        ];
    }

    /**
     * Attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'product_id' => 'Product Id',
            'buyer_id' => 'Buyer Id',
        ];
    }

}
