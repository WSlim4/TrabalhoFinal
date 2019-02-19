<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Suppliers;

class SupplierRequest extends FormRequest
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
        if($this->isMethod('post')){
          return[
            'name' => 'required|string',
            'cnpj' => 'required|formato_cnpj|cnpj',
            'address' => 'required|string',
            'phone' => 'required|telefone|string'
        ];
    }
        if($this->isMethod('put')){
          return [
            'name' => 'string',
            'cnpj' => 'cnpj',
            'address' => 'string',
            'phone' => 'telefone|string'
          ];
      }
  }

    public function messages(){

        return[
          'name.unique' => 'Este nome ja existe',
          'name.required' => 'Insira um nome valido',
          'cnpj.unique' => 'Este cnpj ja existe',
          'cnpj.required' => 'Insira um cnpj valido',
          'address.unique' => 'Este endereco ja existe',
          'address.required' => 'Insira um endereco valido',
          'phone.required' => 'Insira um telefone valido',
          'phone.unique' => 'Este numero de telefone ja existe'
        ];
    }




    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
