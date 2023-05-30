<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(): void
    {
        \App\Models\Position::factory()->createMany([
            ['name' => 'Security'], 
            ['name' => 'Designer'], 
            ['name' => 'Content manager'], 
            ['name' => 'Lawyer']
        ]);

        \App\Models\User::factory(45)->create();

    }
}