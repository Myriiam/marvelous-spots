<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pictures = [
            [
                'article_id'=>1,
                'path'=>'storage/app/public/uploads/users/2/articles/img/london.jpg',
            ],
            [
                'article_id'=>1,
                'path'=>'storage/app/public/uploads/users/2/articles/img/rainy.jpg',
            ],
            [
                'article_id'=>2,
                'path'=>'storage/app/public/uploads/users/6/articles/img/aqua1.jpg',
            ],
            [
                'article_id'=>2,
                'path'=>'storage/app/public/uploads/users/6/articles/img/aqua2.jpg',
            ],
            [
                'article_id'=>3,
                'path'=>'storage/app/public/uploads/users/9/articles/img/resto1.jpg',
            ],
            [
                'article_id'=>3,
                'path'=>'storage/app/public/uploads/users/9/articles/img/resto2.jpg',
            ],
            [
                'article_id'=>4,
                'path'=>'storage/app/public/uploads/users/5/articles/img/shop1.jpg',
            ],
            [
                'article_id'=>4,
                'path'=>'storage/app/public/uploads/users/5/articles/img/shop2.jpg',
            ],
            [
                'article_id'=>5,
                'path'=>'storage/app/public/uploads/users/9/articles/img/cpresto.jpg',
            ],
            [
                'article_id'=>5,
                'path'=>'storage/app/public/uploads/users/9/articles/img/cpresto2.jpg',
            ],
            [
                'article_id'=>5,
                'path'=>'storage/app/public/uploads/users/9/articles/img/cpresto3.jpg',
            ],
            [
                'article_id'=>6,
                'path'=>'storage/app/public/uploads/users/9/articles/img/kayak1.jpg',
            ],
            [
                'article_id'=>6,
                'path'=>'storage/app/public/uploads/users/9/articles/img/kayak2.jpg',
            ],
            [
                'article_id'=>7,
                'path'=>'storage/app/public/uploads/users/9/articles/img/hills1.jpg',
            ],
            [
                'article_id'=>7,
                'path'=>'storage/app/public/uploads/users/9/articles/img/hills2.jpg',
            ],
            [
                'article_id'=>8,
                'path'=>'storage/app/public/uploads/users/5/articles/img/roof1.jpg',
            ],
            [
                'article_id'=>8,
                'path'=>'storage/app/public/uploads/users/5/articles/img/roof2.jpg',
            ],
        ];

        //Insert data in the table
        foreach ($pictures as $data) {

            DB::table('pictures')->insert([
                'article_id' => $data['article_id'],
                'path' => $data['path'],
            ]);
        }
    }
}
