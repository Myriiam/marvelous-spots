<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleComments = [
            [
                'user_id'=>9,
                'article_id'=>8,
                'comment'=>'I would love to go there soon! Thanks for this article Ron !',
                'created_at'=>"2021-10-03 14:45:22",
                'updated_at'=>null,
            ],
            [
                'user_id'=>5,
                'article_id'=>6,
                'comment'=>"I love kayaking especially in winter in the north, it's the top! I did not know this place ... so thank you !",
                'created_at'=>"2021-09-02 20:30:27",
                'updated_at'=>null,
            ],
            [
                'user_id'=>25,
                'article_id'=>6,
                'comment'=>"It's on my list for my next trip! The place must be fabulous too !",
                'created_at'=>"2021-09-18 22:04:02",
                'updated_at'=>null,
            ],
            [
                'user_id'=>28,
                'article_id'=>2,
                'comment'=>"I am a fan of kayaking. And to practice this sport in such a place would be a dream! Thanks for the info.",
                'created_at'=>"2021-08-30 21:36:42",
                'updated_at'=>null,
            ],
            [
                'user_id'=>18,
                'article_id'=>3,
                'comment'=>"Indeed, it is a great place that I also recommend for eating well !",
                'created_at'=>"2021-08-07 11:15:42",
                'updated_at'=>null,
            ],
            [
                'user_id'=>16,
                'article_id'=>4,
                'comment'=>"I think it's a great cause. I'll go and see it as soon as I get back to London...",
                'created_at'=>"2021-07-28 17:20:52",
                'updated_at'=>null,
            ],
        ];

        //Insert data in the table
        foreach ($articleComments as $data) {

            DB::table('article_comments')->insert([
                'user_id' => $data['user_id'],
                'article_id' => $data['article_id'],
                'comment' => $data['comment'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ]);
        }
    }
}
