<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Customers;

class CustomerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
      return [
        'name_customer' => 'required|string',
        'cnpj_customer' => 'required|cnpj',
        'adress_customer' => 'required',
        'phone_customer' => 'telefone|required'
      ];
    }

    public function message(){

      return [
        'name_customer.unique' => 'Este nome ja existe',
        'name_customer.required' => 'Insira um nome valido',
        'cnpj_customer.unique' => 'Este cnpj ja existe',
        'cnpj_customer.required' => 'Insira um cnpj valido',
        'adress_customer.unique' => 'Este endereço ja existe',
        'adress_customer.required' => 'Insira um endereco valido',
        'phone_customer.required' => 'Insira um telefone válido',
        'phone_customer.unique' => 'Este numero de telefone ja existe'
      ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
