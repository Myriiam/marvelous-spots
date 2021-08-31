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
                'pause'=>true,
                'created_at'=>'2021-07-01 19:30:55',
                'since_when'=>'2021-07-07 20:55:50'
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
                'created_at'=>'2021-06-25 19:30:55',
                'since_when'=>'2021-07-01 16:30:50'
            ],
            [
                'user_id'=>6,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>13.5,
                'pause'=>false,
                'created_at'=>'2021-05-14 23:30:00',
                'since_when'=>'2021-05-29 16:30:50'
            ],
            [
                'user_id'=>9,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>14.5,
                'pause'=>false,
                'created_at'=>'2021-06-26 20:10:45',
                'since_when'=>'2021-07-01 17:00:50'
            ],
            [
                'user_id'=>11,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>14.5,
                'pause'=>false,
                'created_at'=>'2021-07-01 19:30:00',
                'since_when'=>'2021-07-05 17:30:50'
            ],
            [
                'user_id'=>12,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>14.5,
                'pause'=>false,
                'created_at'=>'2021-07-22 17:20:00',
                'since_when'=>'2021-08-01 13:30:00'
            ],
            [
                'user_id'=>14,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>14.5,
                'pause'=>false,
                'created_at'=>'2021-06-26 22:30:55',
                'since_when'=>'2021-07-01 10:40:42'
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
                'created_at' => $data['created_at'],
                'since_when' => $data['since_when'],
            ]);
        }
    }
}
