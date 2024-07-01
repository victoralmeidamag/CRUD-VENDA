<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Douglas',
            'sobrenome' => 'Costa',
            'email' => 'teste@gmail.com',
            'password' => 'teste',
            'tipo' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])
    }
}
