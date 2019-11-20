<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'AdminTours',
            'email' => 'admin@tours.com',
            'password' => bcrypt('admin@1234'),
        ]);
    }
}
