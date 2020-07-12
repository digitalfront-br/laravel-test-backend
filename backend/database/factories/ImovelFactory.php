<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Imovel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Imovel::class, function (Faker $faker) {

    $file_estados = file(storage_path('app/public/estados.csv'));
    $file_cidades = file(storage_path('app/public/cidades.csv'));

    foreach ($file_estados as $estado) {
        $estados[] = explode(',', $estado);
    }

    foreach ($file_cidades as $cidade) {
        $cidades[] = explode(',', $cidade);
    }

    foreach ($estados as $item) {
        DB::table('estados')->insert([
            "uf"  =>  $item[1],
            "nome"  =>  $item[2],
            "codigo_uf"  =>  $item[0],
        ]);
    }

    foreach ($cidades as $value) {
        DB::table('cidades')->insert([
            "nome"  =>  $value[1],
            "capital"  =>  $value[4],
            "uf"  =>  $value[5]
        ]);
    }
    $quantidadeImoveis = 50;

    for ($i=0; $i < $quantidadeImoveis; $i++) {
        Imovel::create([
            'email'  =>  $faker->email,
            'rua'    =>  $faker->streetName,
            'bairro' =>  $faker->firstName(),
            'cidade_id' => DB::table('cidades')->get()->random()->id,
        ]);
    }

    return [];
});
