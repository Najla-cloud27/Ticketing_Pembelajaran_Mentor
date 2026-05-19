<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'phone'    => '0895391436605',
                'role'     => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => 'User',
                'email'    => 'user@gmail.com',
                'phone'    => '0895391436706',
                'role'     => 'user',
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}