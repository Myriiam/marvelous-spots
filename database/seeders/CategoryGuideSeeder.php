<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryGuides = [
            [
                'guide_id'=>1,
                'category_id'=>1
            ],
            [
                'guide_id'=>1,
                'category_id'=>2
            ],
            [
                'guide_id'=>1,
                'category_id'=>7
            ],
            [
                'guide_id'=>2,
                'category_id'=>1
            ],
            [
                'guide_id'=>2,
                'category_id'=>3
            ],
            [
                'guide_id'=>2,
                'category_id'=>4
            ],
            [
                'guide_id'=>3,
                'category_id'=>4
            ],
            [
                'guide_id'=>3,
                'category_id'=>5
            ],
            [
                'guide_id'=>3,
                'category_id'=>6
            ],
            [
                'guide_id'=>3,
                'category_id'=>2
            ],
            [
                'guide_id'=>4,
                'category_id'=>1
            ],
            [
                'guide_id'=>4,
                'category_id'=>4
            ],
            [
                'guide_id'=>4,
                'category_id'=>5
            ],
            
            [
                'guide_id'=>5,
                'category_id'=>7
            ],
            [
                'guide_id'=>5,
                'category_id'=>4
            ],
            [
                'guide_id'=>5,
                'category_id'=>3
            ],
            [
                'guide_id'=>5,
                'category_id'=>8
            ],
            [
                'guide_id'=>6,
                'category_id'=>4
            ],
            [
                'guide_id'=>6,
                'category_id'=>5
            ],
            [
                'guide_id'=>7,
                'category_id'=>2
            ],
            [
                'guide_id'=>7,
                'category_id'=>3
            ],
        ];

        //Insert data in the table
        foreach ($categoryGuides as $data) {

            DB::table('category_guide')->insert([
                'guide_id' => $data['guide_id'],
                'category_id' => $data['category_id'],
            ]);
        }
    }
}
