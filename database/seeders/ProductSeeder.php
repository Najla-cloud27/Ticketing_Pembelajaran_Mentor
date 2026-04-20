<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'        => 'Ticket Swim',
                'description' => 'Ticket untuk berenang',
                'price'       => 50000,
                'stock'       => 10,
                'status'      => 'published',
                'criteria'    => 'group',
                'category_id' => 1,
            ],
            [
                'name'        => 'Ticket Zoo',
                'description' => 'Ticket untuk masuk ke kebun binatang',
                'price'       => 75000,
                'stock'       => 20,
                'status'      => 'published',
                'criteria'    => 'single',
                'category_id' => 2,
            ],
            [
                'name'        => 'Ticket Music',
                'description' => 'Ticket untuk konser musik',
                'price'       => 150000,
                'stock'       => 15,
                'status'      => 'published',
                'criteria'    => 'group',
                'category_id' => 3,
            ],
            [
                'name'        => 'Ticket Snow',
                'description' => 'Ticket untuk bermain salju',
                'price'       => 100000,
                'stock'       => 8,
                'status'      => 'published',
                'criteria'    => 'single',
                'category_id' => 4,
            ],
        ]);
    }
}