<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')

        ]);

        DB::table('companies')->insert([
            'name' => 'Jimbos funhouse',
            'email' => 'jimbo@jimbo.com',
            'logo' => '807006.jpg'

        ]);
    }
}
