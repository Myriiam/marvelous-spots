<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guideLanguages = [
            [
                'guide_id'=>1,
                'language_id'=>2
            ],
            [
                'guide_id'=>1,
                'language_id'=>1
            ],
            [
                'guide_id'=>2,
                'language_id'=>1
            ],
            [
                'guide_id'=>3,
                'language_id'=>1
            ],
            [
                'guide_id'=>4,
                'language_id'=>1
            ],
            [
                'guide_id'=>4,
                'language_id'=>3
            ],
            [
                'guide_id'=>4,
                'language_id'=>2
            ],
            [
                'guide_id'=>5,
                'language_id'=>1
            ],
            [
                'guide_id'=>5,
                'language_id'=>4
            ],
            [
                'guide_id'=>6,
                'language_id'=>4
            ],
            [
                'guide_id'=>6,
                'language_id'=>1
            ],
            [
                'guide_id'=>7,
                'language_id'=>1
            ],
            [
                'guide_id'=>7,
                'language_id'=>5
            ],
            [
                'guide_id'=>7,
                'language_id'=>2
            ],
            [
                'guide_id'=>8,
                'language_id'=>1
            ],
            [
                'guide_id'=>8,
                'language_id'=>2
            ],
            [
                'guide_id'=>9,
                'language_id'=>1
            ],
            [
                'guide_id'=>10,
                'language_id'=>1
            ],
            [
                'guide_id'=>11,
                'language_id'=>3
            ],
            [
                'guide_id'=>11,
                'language_id'=>5
            ],
            [
                'guide_id'=>12,
                'language_id'=>1
            ],
            [
                'guide_id'=>12,
                'language_id'=>2
            ],
            [
                'guide_id'=>13,
                'language_id'=>2
            ],
            [
                'guide_id'=>13,
                'language_id'=>1
            ],
            [
                'guide_id'=>13,
                'language_id'=>3
            ],
            [
                'guide_id'=>14,
                'language_id'=>1
            ],
            [
                'guide_id'=>14,
                'language_id'=>5
            ],
            [
                'guide_id'=>15,
                'language_id'=>1
            ],
            [
                'guide_id'=>16,
                'language_id'=>1
            ],
            [
                'guide_id'=>17,
                'language_id'=>1
            ],
            [
                'guide_id'=>18,
                'language_id'=>1
            ],
            [
                'guide_id'=>18,
                'language_id'=>2
            ],
        ];

        //Insert data in the table
        foreach ($guideLanguages as $data) {

            DB::table('guide_language')->insert([
                'guide_id' => $data['guide_id'],
                'language_id' => $data['language_id'],
            ]);
        }
    }
}
