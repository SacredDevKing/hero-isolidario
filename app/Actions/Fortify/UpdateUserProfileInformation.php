<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
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
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'nome' => $input['nome'],
                'sobrenome' => $input['sobrenome'],
                'email' => $input['email'],
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
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'nome' => $input['nome'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
