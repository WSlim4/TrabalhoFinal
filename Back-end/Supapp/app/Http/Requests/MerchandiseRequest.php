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
       if ($this->isMethod('post')){
         return [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'measure' => 'required|string',
            'category' => 'required|string'
            /* tirei pq não obriga a ter no forme
            'supplier_id' => 'required'
            */
          ];
        }
         if ($this->isMethod('put')){
           return[
             'name' => 'string',
             'price' => 'numeric|min:0',
             'supplier_id' => 'numeric'
            ];
         }
    }

    public function messages(){
        return [
            'name.required' => 'Insira um nome para a mercadoria',
            'price.required' => 'Insira um preço para a mercadoria',
            'measure.required' => 'Insira a medida. Ex: quilo, caixa, etc...',
            'category.required' => 'Insira a categoria corretamente. Ex: carne, frio, etc...'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new
      HttpResponseException(response()->json($validator->errors(), 422));
    }
}
