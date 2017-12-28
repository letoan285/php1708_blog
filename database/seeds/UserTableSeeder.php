<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=> 'le toan',
                'email' => 'toan@gmail.com',
                'password' => Hash::make(123456),
                'role' => 20
            ],
            [
                'name'=> 'super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make(123456),
                'role' => 50
            ]
        	
        ];
        DB::table('users')->insert($users);
    }
}
