<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'jo',
                'email' => 'jo@gmail.com',
                'password' => Hash::make('11111111')
            ],
            [
                'name' => 'karn',
                'email' => 'karn@gmail.com',
                'password' => Hash::make('11111111')
            ],
            [
                'name' => 'sai',
                'email' => 'sai@gmail.com',
                'password' => Hash::make('11111111')
            ],
            [
                'name' => 'pam',
                'email' => 'pam@gmail.com',
                'password' => Hash::make('11111111')
            ]

        ]);
    }

}
