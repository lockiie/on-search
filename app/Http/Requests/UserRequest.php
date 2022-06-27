<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
            // 'type' => 'required',
            'city_id' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Informe o nome.',
            'email.required' => 'Informe o email.',
            'cpf.required' => 'Informe o cpf.',
            'phone.required' => 'Informe o telefone.',
            'address.required' => 'Informe o endereço.',
            'neighborhood.required' => 'Informe o bairo.',
            'number.required' => 'Informe o número da casa.',
            // 'type.required' => 'Informe o tipo do usuário.',
            'city_id.required' => 'Informe a cidade.',
        ];
    }

}
