<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Merchandises;

class MerchandiseRequest extends FormRequest
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
             'name_mer' => 'string|required',
             'price' => 'required|numeric|min:0',
             'stock' => 'required|numeric|min:0',
             'category' => 'string|required'
        ];
    }

    public function message(){
        return [
              'name_mer.required' => 'Insira um nome para a mercadoria',
              'price.required' => 'Insira um preço para a mercadoria',
              'stock.required' => 'Insira a quantidade',
              'category.required' => 'Insira a categoria corretamente'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
