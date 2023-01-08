<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
            ],
            'phone' => [
                'bail',
                'required',
            ],
            'address' => [
                'bail',
                'required',
            ],
            'idcard' => [
                'bail',
                'required',
            ],

        ];
    }
    public function messages()
    {
        return[
            'required'=>':attributes không được để trống',
            'unique'=>'Email đã được sử dụng'
        ];
    }
    public function attributes(){
        return[
            'name'=>'Name',
            'email'=>'Email',
            'password'=>'Password',
            'phone' => 'Phone',
            'birth'=>'Birth',
            'address'=>'Address',
            'idcard'=>'IDcard'
        ];
    }
}
