<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Seeder;

class DonationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donation::create([
            'id_usuario' => '1',
            'nome' => 'Nike Revolution 5',
            'categoria' => 'Calçados',
            'quantidade' => '1',
            'descricao' => 'Tênis para corrida muito confortável!',
            'foto' => 'images/nike.jpg',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '2',
            'nome' => 'Pneu Aro 13” Goodyear',
            'categoria' => 'Autos e peças',
            'quantidade' => '1',
            'descricao' => 'O Pneu da linha Direction Touring 175/70R13 é ideal para você que busca um produto com ótima qualidade, segurança, tração e custo benefício! Ele possui uma estrutura em borracha super resistente, aro 13 e medida 175/70R13 tornando-o ainda mais útil. Esse modelo foi desenvolvido especialmente para carros como Gol, Palio e Uno. O índice de carga deste pneu é de 82T, esse número corresponde ao peso máximo que um pneu pode suportar quando é inflado corretamente, sendo assim quanto maior o número do índice de carga do pneu, maior a capacidade de carga. A marca Goodyear dá um show quando o requisito é qualidade!',
            'foto' => 'images/pneu.jpg',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '3',
            'nome' => 'Guitarra Strinberg Strato sts100 preto satin',
            'categoria' => 'Instrumentos musicais',
            'quantidade' => '1',
            'descricao' => 'guitarra strinberg strato sts100 preto satin, semi usada em boa qualidade.',
            'foto' => 'images/guitarra.jpg',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '3',
            'nome' => 'Aquarela Sakura koi 18 cores',
            'categoria' => 'Outros',
            'quantidade' => '1',
            'descricao' => 'aquarela da marca sakura koi usada, sem a cor branca',
            'foto' => 'images/aquarela.jpg',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '4',
            'nome' => 'Coleção brinquedos do Minecraft',
            'categoria' => 'Esportes e lazer',
            'quantidade' => '1',
            'descricao' => 'Conjunto de brinquedos do Minecraft antigos do meu filho',
            'foto' => 'images/minecraft.png',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '4',
            'nome' => 'Guitarra',
            'categoria' => 'Esportes e lazer',
            'quantidade' => '1',
            'descricao' => 'Guitarra antiga Tonante',
            'foto' => 'images/guitarra2.png',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '4',
            'nome' => 'Nokia 5125',
            'categoria' => 'Eletrônicos',
            'quantidade' => '1',
            'descricao' => 'Nokia 5125 top de qualidade',
            'foto' => 'images/nokia.png',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '4',
            'nome' => 'Copos de shot',
            'categoria' => 'Utensílios domésticos',
            'quantidade' => '1',
            'descricao' => 'Copos de shot do Loneey Tunes',
            'foto' => 'images/copo.jpeg',
            'status' => 'Anunciado'
        ]);
        Donation::create([
            'id_usuario' => '4',
            'nome' => 'Ferradura',
            'categoria' => 'Produtos pet',
            'quantidade' => '4',
            'descricao' => 'Ferradura antiga do meu cavalo Jorge',
            'foto' => 'images/ferradura.png',
            'status' => 'Anunciado'
        ]);
    }
}
