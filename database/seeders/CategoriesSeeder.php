<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'        => 'Swim',
                'description' => 'Swimming related tickets',
            ],
            [
                'name'        => 'Zoo',
                'description' => 'Ragunan',
            ],
            [
                'name'        => 'Music',
                'description' => 'Music Bollywood',
            ],
            [
                'name'        => 'Snow',
                'description' => 'Snow World',
            ],
        ]);
    }
}
