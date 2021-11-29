<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*'nome',
        'sobrenome',
        'email',
        'password',
        'apelido',
        'genero',
        'celular',
        'data_nascimento',
        'cidade',
        'rua',
        'bairro',
        'numero',
        'uf',
        'cep',
        'qntd_pedidos'
        */
        User::create([
            'nome' => 'Nicholas',
            'sobrenome' => 'Costa',
            'email' => 'nikinhomatheus@hotmail.com',
            'password' => Hash::make('Nickteusplay50!'),
            'apelido' => 'Mus4ng',
            'genero' => 'Masculino',
            'celular' => '(11) 95652-3233',
            'data_nascimento' => '2004-11-08',
            'cidade' => 'Francisco Morato',
            'rua' => 'Avenida Afonso Moreno',
            'bairro' => 'Nova Belem',
            'numero' => '410',
            'uf' => 'sp',
            'cep' => '07.908-190',
            'qntd_pedidos' => 2
        ]);

        User::create([
            'nome' => 'Gustavo',
            'sobrenome' => 'Rocha Medeiros',
            'email' => 'guazt22309@gmail.com',
            'password' => Hash::make('N12345678!'),
            'apelido' => 'Guss',
            'genero' => 'Masculino',
            'celular' => '(11) 96335-4682',
            'data_nascimento' => '2004-03-12',
            'cidade' => 'Francisco Morato',
            'rua' => 'Av. Aracaju',
            'bairro' => 'Parque 120',
            'numero' => '367',
            'uf' => 'sp',
            'cep' => '07.940-010',
            'qntd_pedidos' => 2
        ]);

        User::create([
            'nome' => 'Ryan',
            'sobrenome' => 'Silva',
            'email' => 'ryan.vups@gmail.com',
            'password' => Hash::make('N12345678!'),
            'apelido' => 'rywa',
            'genero' => 'Masculino',
            'celular' => '(11) 99150-3941',
            'data_nascimento' => '2004-12-16',
            'cidade' => 'Francisco Morato',
            'rua' => 'Toqui',
            'bairro' => 'Jardim Liliane',
            'numero' => '376',
            'uf' => 'sp',
            'cep' => '07.907-030',
            'qntd_pedidos' => 2
        ]);

        User::create([
            'nome' => 'Willian',
            'sobrenome' => 'Machado',
            'email' => 'willianapmg@gmail.com',
            'password' => Hash::make('N12345678!'),
            'apelido' => 'Will APM',
            'genero' => 'Masculino',
            'celular' => '(11) 99372-3624',
            'data_nascimento' => '2004-10-02',
            'cidade' => 'Francisco Morato',
            'rua' => 'Avenida Princesa Isabel',
            'bairro' => 'Parque 120',
            'numero' => '257',
            'uf' => 'sp',
            'cep' => '07.940-000',
            'qntd_pedidos' => 2
        ]);
    }
}
