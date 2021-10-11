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
            [
                'user_id'=>16,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>11.5,
                'pause'=>false,
                'created_at'=>'2021-10-01 20:26:25',
                'since_when'=>'2021-10-11 12:40:25'
            ],
            [
                'user_id'=>17,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>13.0,
                'pause'=>false,
                'created_at'=>'2021-10-01 21:30:20',
                'since_when'=>'2021-10-10 09:30:02'
            ],
            [
                'user_id'=>18,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>14.5,
                'pause'=>false,
                'created_at'=>'2021-07-01 21:33:20',
                'since_when'=>'2021-08-02 09:15:30'
            ],
            [
                'user_id'=>19,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>12.0,
                'pause'=>true,
                'created_at'=>'2021-10-03 12:35:55',
                'since_when'=>'2021-10-09 10:36:30'
            ],
            [
                'user_id'=>20,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>11.5,
                'pause'=>false,
                'created_at'=>'2021-10-03 13:32:07',
                'since_when'=>'2021-10-09 10:50:55'
            ],
            [
                'user_id'=>21,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>12.0,
                'pause'=>false,
                'created_at'=>'2021-10-03 22:13:16',
                'since_when'=>'2021-10-10 11:00:55'
            ],
            [
                'user_id'=>22,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>13.5,
                'pause'=>false,
                'created_at'=>'2021-10-02 20:20:58',
                'since_when'=>'2021-10-10 11:20:55'
            ],
            [
                'user_id'=>23,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>12.5,
                'pause'=>false,
                'created_at'=>'2021-08-01 21:52:58',
                'since_when'=>'2021-08-20 11:15:05'
            ],
            [
                'user_id'=>24,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>12.5,
                'pause'=>false,
                'created_at'=>'2021-08-01 21:45:58',
                'since_when'=>'2021-08-20 11:23:56'
            ],
            [
                'user_id'=>27,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>11.5,
                'pause'=>false,
                'created_at'=>'2021-08-22 19:30:05',
                'since_when'=>'2021-08-31 13:50:05'
            ],
            [
                'user_id'=>28,
                'motivation'=>"I'm passionate by travelling. I\m born here in London so I know every little secrets places that a few poeple know. 
                                I'm sociable and I would like to share my knowledge...",
                'travel_definition'=>"For me, travel mean discovering the world and meeting new people.",
                'offering'=>"I can show you all the places where the fun is guarented !",
                'status'=>"accepted",
                'price'=>10.5,
                'pause'=>false,
                'created_at'=>'2021-04-10 19:00:05',
                'since_when'=>'2021-04-25 13:15:36'
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
