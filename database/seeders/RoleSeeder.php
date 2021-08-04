<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        //Define data
        $roles = [
            ['role'=>'administrator'],
            ['role'=>'moderator'],
            ['role'=>'traveler'],
            ['role'=>'guide'],
        ];

        //Insert data in the table
        foreach ($roles as $data) {
            DB::table('roles')->insert([
                'role' => $data['role'],
            ]);
        }
    }
}
