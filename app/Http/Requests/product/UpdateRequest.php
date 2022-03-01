<?php


namespace App\Http\Requests\product;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'price' => ['required','min:2'],
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
            'product_name' => 'Product Name',
            'sku_code' => 'SKU code',
            'price' => 'Price',
            'image' => 'Image',
        ];
    }

}
