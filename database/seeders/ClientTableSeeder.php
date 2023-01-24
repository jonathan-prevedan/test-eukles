<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Client;


class ClientTableSeeder extends Seeder {

    public function run()
    {
        \App\Models\Client::factory(10)->create();

        \App\Models\Client::factory()->create([
            'nom' => 'Test User',
            'prenom' => 'Etienne.com',
        ]);
    }
}