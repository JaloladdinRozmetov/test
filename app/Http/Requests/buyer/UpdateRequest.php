<?php


namespace App\Http\Requests\buyer;


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
            'first_name' => ['required','max:256'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'image' => 'Image',
        ];
    }


}
