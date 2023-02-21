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
            'name' => 'Wordpress',
            'email' => 'wordpress@probablywordpress.com',
            'logo' => 'public/JEE4cngEBa1zmNzq9UBOTJL4AaTpmBO7zx8cOX1i.png',
            'website' => 'http://itwastheonlylogoihadonmycomputer.com'

        ]);

        DB::table('employees')->insert([
            'first_name' => 'Jim',
            'last_name' => 'Jimothan',
            'company_id' => 1,
            'company' => 'Wordpress',
            'email' => 'jim@jim.com',
            'phone_no' => '01592573855'

        ]);
    }
}
