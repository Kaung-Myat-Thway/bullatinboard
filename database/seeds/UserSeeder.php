<?php
namespace Database\Seeders;
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
        DB::table('users')->insert([
            'name' => 'KaungMyat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminpass'),
            'profile' => 'profile.jpeg',
            'type' => '0',
            'phone' => '09421009283',
            'address' => 'Yangon',
            'dob' => '1997/07/22',
            'create_user_id' => '1',
            'updated_user_id' => '1',
        ]);
    }
}
