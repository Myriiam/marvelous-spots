<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guides = [
            [
                'user_id'=>2,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>null,
                'pause'=>false,
                'since_when'=>'2021-07-05 20:55:50'
            ],
            [
                'user_id'=>5,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>10.5,
                'pause'=>false,
                'since_when'=>'2021-07-01 19:30:50'
            ],
           
        ];

         //Insert data in the table
         foreach ($guides as $data) {

            DB::table('guides')->insert([
                'user_id' => $data['user_id'],
                'motivation' => $data['motivation'],
                'travel_definition' => $data['travel_definition'],
                'offering' => $data['offering'],
                'status' => $data['status'],
                'price' => $data['price'],
                'pause' => $data['pause'],
                'since_when' => $data['since_when'],
            ]);
        }
    }
}
