<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'apelido' => ['required', 'string', 'max:255'],
            'genero' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'string', 'date', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'rua' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'nome' => $input['nome'],
            'sobrenome' => $input['sobrenome'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'apelido' => $input['apelido'],
            'genero' => $input['genero'],
            'celular' => $input['celular'],
            'data_nascimento' => $input['data_nascimento'],
            'cidade' => $input['cidade'],
            'rua' => $input['rua'],
            'bairro' => $input['bairro'],
            'numero' => $input['numero'],
            'uf' => $input['uf'],
            'cep' => $input['cep'],
            'qntd_pedidos' => '2'
        ]);
    }
}
