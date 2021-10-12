<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favoriteGuides = [
            [
                'user_id'=>9,
                'guide_id'=>3,
                'created_at'=>"2021-07-19 14:45:22",
            ],
            [
                'user_id'=>9,
                'guide_id'=>2,
                'created_at'=>"2021-07-25 15:20:00",
            ],
            [
                'user_id'=>9,
                'guide_id'=>7,
                'created_at'=>"2021-08-13 22:14:45",
            ],
            [
                'user_id'=>9,
                'guide_id'=>10,
                'created_at'=>"2021-10-02 20:45:59",
            ],
            [
                'user_id'=>6,
                'guide_id'=>2,
                'created_at'=>"2021-05-02 20:12:59",
            ],
            [
                'user_id'=>6,
                'guide_id'=>7,
                'created_at'=>"2021-05-13 18:02:39",
            ],
            [
                'user_id'=>6,
                'guide_id'=>12,
                'created_at'=>"2021-07-01 21:16:03",
            ],
            [
                'user_id'=>6,
                'guide_id'=>9,
                'created_at'=>"2021-07-01 21:20:27",
            ],
            [
                'user_id'=>8,
                'guide_id'=>4,
                'created_at'=>"2021-07-23 17:22:47",
            ],
            [
                'user_id'=>8,
                'guide_id'=>3,
                'created_at'=>"2021-08-10 23:24:23",
            ],
            [
                'user_id'=>8,
                'guide_id'=>13,
                'created_at'=>"2021-08-10 23:45:33",
            ],
            [
                'user_id'=>25,
                'guide_id'=>16,
                'created_at'=>"2021-08-29 19:45:33",
            ],
            [
                'user_id'=>25,
                'guide_id'=>18,
                'created_at'=>"2021-08-29 20:00:48",
            ],
            [
                'user_id'=>25,
                'guide_id'=>10,
                'created_at'=>"2021-09-12 18:30:16",
            ],
            [
                'user_id'=>26,
                'guide_id'=>13,
                'created_at'=>"2021-08-30 15:37:56",
            ],
            [
                'user_id'=>26,
                'guide_id'=>10,
                'created_at'=>"2021-08-30 15:55:00",
            ],
            [
                'user_id'=>26,
                'guide_id'=>5,
                'created_at'=>"2021-09-08 18:23:10",
            ],
        ];

        //Insert data in the table
        foreach ($favoriteGuides as $data) {

            DB::table('favorite_guides')->insert([
                'user_id' => $data['user_id'],
                'guide_id' => $data['guide_id'],
                'created_at' => $data['created_at'],
            ]);
        }
    }
}
