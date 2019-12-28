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
            'name' => 'User',
            'email' => 'user@tours.com',
            'password' => bcrypt('user@1234'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@tours.com',
            'password' => bcrypt('admin@1234'),
        ]);
    }
}
