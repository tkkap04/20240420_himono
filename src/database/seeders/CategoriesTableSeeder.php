<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'content' => '商品のお届けについて',
            ],
            [
                'content' => '商品の交換について',
            ],
            [
                'content' => '商品トラブル',
            ],
            [
                'content' => 'ショップへのお問い合わせ',
            ],
            [
                'content' => 'その他',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
