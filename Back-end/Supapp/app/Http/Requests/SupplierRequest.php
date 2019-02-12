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
        return [
          'name_supplier' => 'string|required',
          'cnpj_supplier' => 'required|cnpj',
          'adress_supplier' => 'required',
          'phone_supplier' => 'required|telefone'
        ];
    }

    public function message(){

        return[
          'name_supplier.unique' => 'Este nome ja existe',
          'name_supplier.required' => 'Insira um nome valido',
          'cnpj_supplier.unique' => 'Este cnpj ja existe',
          'cnpj_supplier.required' => 'Insira um cnpj valido',
          'adress_supplier.unique' => 'Este endereco ja existe',
          'adress_supplier.required' => 'Insira um endereco valido',
          'phone_supplier.required' => 'Insira um telefone valido',
          'phone_supplier.unique' => 'Este numero de telefone ja existe'
        ];
    }




    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
