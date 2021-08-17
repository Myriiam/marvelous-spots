<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'=>"culture/history",
                'description'=>"All activities related to culture in general (music, art, architecture, theater, tradition) 
                                and to the history of the city (visits to museums, historical sites).",
            ],
            [
                'name'=>"fashion/shopping",
                'description'=>"Visit shopping streets and avenues to discover stores of all kinds, 
                                related to fashion of course and especially! From vintage to haute couture.",
            ],
            [
                'name'=>"nightlife",
                'description'=>"About activities for people who like to go out at night.",
            ],
            [
                'name'=>"sport/adventure",
                'description'=>"Sweaty activities. From kayaking to hiking and even an introduction to a sport. For the thrill-seekers.",
            ],
            [
                'name'=>"Exploration",
                'description'=>"To discover unusual places and go on an urban exploration for example. It is sometimes long hours of walking that are assured (but public transport also exists). 
                                This involve an immersion in the daily life of the locals.",
            ],
            [
                'name'=>"nature/wellness",
                'description'=>"To discover spas, public baths, initiation to meditation sessions. Everything that is good for the body and the mind! 
                                Go for a walk in parks or take the small country roads to clear your head and reconnect with nature...",
            ],
            [
                'name'=>"child-friendly",
                'description'=>"Activities for adults and children. For parents who travel with their children.",
            ],
        ];

        //Insert data in the table
        foreach ($categories as $data) {
            DB::table('categories')->insert([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        }

    }
}
