<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleCategories = [
            [
                'article_id'=>1,
                'category_id'=>1
            ],
            [
                'article_id'=>1,
                'category_id'=>6
            ],
            [
                'article_id'=>2,
                'category_id'=>6
            ],
            [
                'article_id'=>2,
                'category_id'=>8
            ],
            [
                'article_id'=>3,
                'category_id'=>3
            ],
            [
                'article_id'=>3,
                'category_id'=>4
            ],
            [
                'article_id'=>4,
                'category_id'=>2
            ],
           
        ];

        //Insert data in the table
        foreach ($articleCategories as $data) {

            DB::table('article_category')->insert([
                'article_id' => $data['article_id'],
                'category_id' => $data['category_id'],
            ]);
        }
    }
}
