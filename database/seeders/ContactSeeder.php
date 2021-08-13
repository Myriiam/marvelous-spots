<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'sender_id'=>2,
                'receiver_id'=>3,
                'subject'=>'question on public transport',
                'message'=>"Hello, I have a question...",
                'status'=>"read",
            ],
            [
                'sender_id'=>4,
                'receiver_id'=>3,
                'subject'=>'want more details about ...',
                'message'=>"Hello, nice to meet you !",
                'status'=>"unread",
            ],
            [
                'sender_id'=>2,
                'receiver_id'=>4,
                'subject'=>'question about the area of ... ',
                'message'=>"Hi, how are you ?",
                'status'=>"read",
            ],
        ];

        //Insert data in the table
        foreach ($contacts as $data) {

            DB::table('contacts')->insert([
                'sender_id' => $data['sender_id'],
                'receiver_id' => $data['receiver_id'],
                'subject' => $data['subject'],
                'message' => $data['message'],
                'status' => $data['status'],
            ]);
        }
    }
}
