<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string'],
            'fantasy_name' => ['bail', 'string'],
            'email' => ['bail', 'required', 'email', 'unique:users,email'],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            'cnpj' => ['bail', 'required', 'string', 'unique:institutions,cnpj'],
            'inep' => ['bail', 'required', 'string', 'unique:institutions,inep'],
            'admin_dependency' => ['bail', 'required', 'string'],
            'phases' => ['bail', 'required', 'string'],
            'modalities' => ['bail', 'required', 'string'],
            'type' => ['bail', 'required', 'string'],
            'is_admin' => ['bail', 'required', 'boolean'],
            // Todo: verificar o state_registration para que serve
            'state_registration' => ['bail',  'string'],
            'phone' => ['bail', 'required', 'array:ddi,ddd,number'],
            'phone.ddi' => ['bail', 'required_with:phone', 'string'],
            'phone.ddd' => ['bail', 'required_with:phone', 'string'],
            'phone.number' => ['bail', 'required_with:phone', 'string'],
            'address' => ['bail', 'required', 'array:street,number,complement,neighborhood,city,state,zip_code'],
            'address.street' => ['bail', 'required_with:address', 'string'],
            'address.number' => ['bail', 'required_with:address', 'string'],
            "address.complement" => ['bail', 'string'],
            'address.neighborhood' => ['bail', 'required_with:address', 'string'],
            'address.city' => ['bail', 'required_with:address', 'string'],
            'address.state' => ['bail', 'required_with:address', 'string'],
            'address.zip_code' => ['bail', 'required_with:address', 'string'],
            "metadata" => ["bail", 'required', 'array:responsible_name,responsible_cpf'],
            "metadata.responsible_name" => ['bail', 'required_with:metadata', 'string'],
            "metadata.responsible_cpf" => ['bail', 'required_with:metadata', 'string'],

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'fantasy_name.string' => 'O campo nome fantasia deve ser uma string.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um email válido.',
            'email.unique' => 'O email informado já está em uso.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.array' => 'O campo telefone deve ser um array.',
            'phone.ddi.required_if' => 'O campo ddi é obrigatório.',
            'phone.ddd.required_if' => 'O campo ddd é obrigatório.',
            'phone.number.required_if' => 'O campo número é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'O campo senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'O campo senha não confere com a confirmação.',
            'cnpj.required' => 'O campo cnpj é obrigatório.',
            'cnpj.string' => 'O campo cnpj deve ser uma string.',
            'cnpj.unique' => 'O cnpj informado já está em uso.',
            'inep.required' => 'O campo inep é obrigatório.',
            'inep.string' => 'O campo inep deve ser uma string.',
            'inep.unique' => 'O inep informado já está em uso.',
            'admin_dependency.required' => 'O campo dependência administrativa é obrigatório.',
            'admin_dependency.string' => 'O campo dependência administrativa deve ser uma string.',
            'phases.required' => 'O campo etapas é obrigatório.',
            'phases.string' => 'O campo etapas deve ser uma string.',
            'modalities.required' => 'O campo modalidades é obrigatório.',
            'modalities.string' => 'O campo modalidades deve ser uma string.',
            'type.required' => 'O campo tipo é obrigatório.',
            'type.string' => 'O campo tipo deve ser uma string.',
            'is_admin.required' => 'O campo é administrador é obrigatório.',
            'is_admin.boolean' => 'O campo é administrador deve ser um booleano.',
            'state_registration.required' => 'O campo registro estadual é obrigatório.',
            'state_registration.string' => 'O campo registro estadual deve ser uma string.',
            'address.required' => 'O campo endereço é obrigatório.',
            'address.array' => 'O campo endereço deve ser um array.',
            'address.street.required' => 'O campo rua é obrigatório.',
            'address.street.string' => 'O campo rua deve ser uma string.',
            'address.number.required' => 'O campo número é obrigatório.',
            'address.number.string' => 'O campo número deve ser uma string.',
            'address.complement.string' => 'O campo complemento deve ser uma string.',
            'address.neighborhood.required' => 'O campo bairro é obrigatório.',
            'address.neighborhood.string' => 'O campo bairro deve ser uma string.',
            'address.city.required' => 'O campo cidade é obrigatório.',
            'address.city.string' => 'O campo cidade deve ser uma string.',
            'address.state.required' => 'O campo estado é obrigatório.',
            'address.state.string' => 'O campo estado deve ser uma string.',
            'address.zip_code.required' => 'O campo cep é obrigatório.',
            'address.zip_code.string' => 'O campo cep deve ser uma string.',
            'metadata.required' => 'Os campos do usuário responsavél é obrigatório.',
            'metadata.array' => 'sO campos do usuário responsavél deve ser um array.',
            'metadata.responsible_name.required' => 'O campo nome do responsável é obrigatório.',
            'metadata.responsible_name.string' => 'O campo nome do responsável deve ser uma string.',
            'metadata.responsible_cpf.required' => 'O campo cpf do responsável é obrigatório.',
            'metadata.responsible_cpf.string' => 'O campo cpf do responsável deve ser uma string.',

        ];
    }
}
