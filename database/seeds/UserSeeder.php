<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mul_rows= [
            [
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'password' => Hash::make('adminpass'),
              'profile' => 'profile.jpg',
              'type' => '0',
              'phone' => '017829983',
              'address' => 'Yangon',
              'dob' => '1997/07/22',
              'created_user_id' => '1',
              'updated_user_id' => '1',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
              
            ],
            [
              'name' => 'user',
              'email' => 'user@gmail.com',
              'password' => Hash::make('userpass'),
              'profile' => 'profile.jpg',
              'type' => '1',
              'phone' => '01591872',
              'address' => 'Yangon',
              'dob' => '1996/05/21',
              'created_user_id' => '1',
              'updated_user_id' => '1',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        foreach ($mul_rows as $rows) {
          DB::table('users')->insert($rows);
        }
    }
}
