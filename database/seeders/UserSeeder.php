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
        $data = array(
            'full_name' => 'Admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'contact_number' => 987654321,
            'address' => 'Malekhu, Dhading',
            'vehicle_number' => 'BA 12 PA 9833',
            'password' => Hash::make('Password')
        );
        DB::table('users')->insert($data);
    }
}
