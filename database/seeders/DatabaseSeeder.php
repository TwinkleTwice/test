<?php

namespace Database\Seeders;

use App\Models\Check;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(5)->create();

         Check::factory(5)->create();
    }
}