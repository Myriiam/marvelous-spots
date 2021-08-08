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
                'guide_id'=>1,
            ],
            [
                'language'=>"English",
                'guide_id'=>1,
            ],
            [
                'language'=>"English",
                'guide_id'=>2,
            ],
            [
                'language'=>"English",
                'guide_id'=>3,
            ],
            [
                'language'=>"English",
                'guide_id'=>4,
            ],
            [
                'language'=>"Arabic",
                'guide_id'=>4,
            ],
            [
                'language'=>"French",
                'guide_id'=>4,
            ],
            [
                'language'=>"English",
                'guide_id'=>5,
            ],
            [
                'language'=>"Italian",
                'guide_id'=>5,
            ],
            [
                'language'=>"English",
                'guide_id'=>6,
            ],
            [
                'language'=>"Italian",
                'guide_id'=>6,
            ],
            [
                'language'=>"English",
                'guide_id'=>7,
            ],
            [
                'language'=>"French",
                'guide_id'=>7,
            ],
            [
                'language'=>"Spanish",
                'guide_id'=>7,
            ],
        ];

        //Insert data in the table
        foreach ($languages as $data) {

            DB::table('languages')->insert([
                'language' => $data['language'],
                'guide_id' => $data['guide_id'],
            ]);
        }
    }
}
