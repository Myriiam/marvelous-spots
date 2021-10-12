<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentGuides = [
            [
                'booking_id'=>1,
                'comment'=>'It was a very intersting visit ! I recommend this guide.',
                'created_at'=>"2021-09-13 14:45:22",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>2,
                'comment'=>'I had a great afternoon with Hilda! Lots to see in Denmark.',
                'created_at'=>"2021-09-29 17:05:15",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>3,
                'comment'=>'Nora is super funny and so kind. As a guide, she is on top ! Thanks for everything, see ya.',
                'created_at'=>"2021-10-02 22:05:45",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>4,
                'comment'=>'Arun is super funny and so kind. He really knows his city like the back of his hand ! Thanks for everything, see you soon.',
                'created_at'=>"2021-09-29 20:16:05",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>5,
                'comment'=>'What a wonderful day! Everything was great...',
                'created_at'=>"2021-09-10 15:42:35",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>6,
                'comment'=>'Even though you were late for our appointment, it was a nice visit.',
                'created_at'=>"2021-09-10 15:42:35",
                'updated_at'=>null,
            ],
            [
                'booking_id'=>7,
                'comment'=>'Roberto is a very good guide. You can trust him to show you incredible places.',
                'created_at'=>"2021-09-26 20:56:15",
                'updated_at'=>null,
            ],
        ];

        //Insert data in the table
        foreach ($commentGuides as $data) {

            DB::table('comment_guides')->insert([
                'booking_id' => $data['booking_id'],
                'comment' => $data['comment'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ]);
        }
    }
}
