<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'language'=>"French",
                'user_id'=>2,
            ],
            [
                'language'=>"English",
                'user_id'=>2,
            ],
            [
                'language'=>"English",
                'user_id'=>3,
            ],
            [
                'language'=>"Spanish",
                'user_id'=>3,
            ],
            [
                'language'=>"English",
                'user_id'=>5,
            ],
            [
                'language'=>"English",
                'user_id'=>6,
            ],
            [
                'language'=>"English",
                'user_id'=>9,
            ],
            [
                'language'=>"Arabic",
                'user_id'=>9,
            ],
            [
                'language'=>"English",
                'user_id'=>11,
            ],
            [
                'language'=>"Italian",
                'user_id'=>11,
            ],
            [
                'language'=>"English",
                'user_id'=>12,
            ],
            [
                'language'=>"Italian",
                'user_id'=>12,
            ],
            [
                'language'=>"English",
                'user_id'=>14,
            ],
            [
                'language'=>"French",
                'user_id'=>14,
            ],
            [
                'language'=>"Spanish",
                'user_id'=>14,
            ],
        ];

        //Insert data in the table
        foreach ($languages as $data) {

            DB::table('languages')->insert([
                'language' => $data['language'],
                'user_id' => $data['user_id'],
            ]);
        }
    }
}
