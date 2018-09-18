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
            'name' => 'Gipsz Jakab',
            'email' => 'gipsz.jakab@gmail.com',
            'password' => bcrypt('secret'),
            'remember_token' => '7YC0Sxth7AYe4RFSjzaPf2ygLCecJhPbyXhz6vvF',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
