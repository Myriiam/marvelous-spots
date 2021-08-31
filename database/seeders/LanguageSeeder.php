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
            ['language'=>"English"],
            ['language'=>"French"],
            ['language'=>"Arabic"],
            ['language'=>"Italian"],
            ['language'=>"Spanish"],
        ];

        //Insert data in the table
        foreach ($languages as $data) {
            DB::table('languages')->insert([
                'language' => $data['language'],
            ]);
        }
    }
}
