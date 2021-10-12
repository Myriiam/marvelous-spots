<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = [
            [
                'user_id'=>9,
                'guide_id'=>7,
                'visit_date'=>'2021-09-11',
                'nb_hours'=>2,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-02 14:46:31",
                'total_price'=>29.00,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-09-02 12:46:31",
            ],
            [
                'user_id'=>9,
                'guide_id'=>3,
                'visit_date'=>'2021-09-25',
                'nb_hours'=>3,
                'nb_person'=>1,
                'message'=>"Hi. Please, I am interested in marine life and would love to visit the coastline.",
                'booked_at'=>"2021-09-02 15:03:50",
                'total_price'=>40.50,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-09-02 13:03:50",
            ],
            [
                'user_id'=>9,
                'guide_id'=>7,
                'visit_date'=>'2021-10-01',
                'nb_hours'=>2,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-02 17:05:37",
                'total_price'=>29.00,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-09-02 15:05:37",
            ],
            [
                'user_id'=>6,
                'guide_id'=>4,
                'visit_date'=>'2021-09-23',
                'nb_hours'=>2,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-06 21:02:34",
                'total_price'=>29.00,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-09-06 19:02:34",
            ],
            [
                'user_id'=>5,
                'guide_id'=>3,
                'visit_date'=>'2021-09-03',
                'nb_hours'=>1,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-08-06 18:02:31",
                'total_price'=>13.50,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-08-08 19:02:34",
            ],
            [
                'user_id'=>14,
                'guide_id'=>2,
                'visit_date'=>'2021-09-05',
                'nb_hours'=>3,
                'nb_person'=>2,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-08-07 18:02:31",
                'total_price'=>63.00,
                'status_demand'=>"booked",
                'status_offer'=>"booked",
                'payed_at'=>"2021-08-09 10:20:34",
            ],
            [
                'user_id'=>7,
                'guide_id'=>5,
                'visit_date'=>'2021-09-25',
                'nb_hours'=>3,
                'nb_person'=>2,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-12 14:45:22",
                'total_price'=>87.00,
                'status_demand'=>"paiement",
                'status_offer'=>"waiting for paiement",
                'payed_at'=>null,
            ],
            [
                'user_id'=>26,
                'guide_id'=>15,
                'visit_date'=>'2021-10-23',
                'nb_hours'=>3,
                'nb_person'=>2,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-23 16:30:50",
                'total_price'=>75.00,
                'status_demand'=>"pending",
                'status_offer'=>null,
                'payed_at'=>null,
            ],
            [
                'user_id'=>9,
                'guide_id'=>10,
                'visit_date'=>'2021-10-12',
                'nb_hours'=>3,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-29 17:23:22",
                'total_price'=>43.50,
                'status_demand'=>"paiement",
                'status_offer'=>"waiting for paiement",
                'payed_at'=>null,
            ],
            [
                'user_id'=>13,
                'guide_id'=>4,
                'visit_date'=>'2021-10-24',
                'nb_hours'=>2,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-10-07 19:26:04",
                'total_price'=>29.00,
                'status_demand'=>"pending",
                'status_offer'=>null,
                'payed_at'=>null,
            ],
            [
                'user_id'=>13,
                'guide_id'=>4,
                'visit_date'=>'2021-10-17',
                'nb_hours'=>4,
                'nb_person'=>2,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-12 14:45:22",
                'total_price'=>116.00,
                'status_demand'=>"paiement",
                'status_offer'=>"waiting for paiement",
                'payed_at'=>null,
            ],
            [
                'user_id'=>6,
                'guide_id'=>8,
                'visit_date'=>'2021-10-24',
                'nb_hours'=>3,
                'nb_person'=>1,
                'message'=>"I would like to know if you available to show me the area and the place to go to meet new people.
                            I would like to see the places still intact, not touristy. 
                            I am interested in the history of your city, especially for a personal project.",
                'booked_at'=>"2021-09-12 14:45:22",
                'total_price'=>34.50,
                'status_demand'=>"pending",
                'status_offer'=>null,
                'payed_at'=>null,
            ],
        ];

        //Insert data in the table
        foreach ($bookings as $data) {

            DB::table('bookings')->insert([
                'user_id' => $data['user_id'],
                'guide_id' => $data['guide_id'],
                'visit_date' => $data['visit_date'],
                'nb_hours' => $data['nb_hours'],
                'nb_person' => $data['nb_person'],
                'message' => encrypt($data['message']),
                'booked_at' => $data['booked_at'],
                'total_price' => $data['total_price'],
                'status_demand' => $data['status_demand'],
                'status_offer' => $data['status_offer'],
                'payed_at' => $data['payed_at'],
            ]);
        }
    }
}
