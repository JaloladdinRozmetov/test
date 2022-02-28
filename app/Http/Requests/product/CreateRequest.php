<?php


namespace App\Http\Requests\product;


use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'product_name' => ['required','max:256'],
            'price' => ['required'],
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png',
                'max:5120',
                'dimensions:width=300,height=300'
            ],
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
            'product_name' => 'product_name',
            'sku_code' => 'SKU code',
            'price' => 'Price',
            'image' => 'Image',
        ];
    }
}
