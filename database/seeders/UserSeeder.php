<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
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
        User::truncate();
        Schema::enableForeignKeyConstraints();

        //Define data
        $users = [
            [
                'firstname'=>'Myriam',
                'lastname'=>'Kadi',
                'role'=>'Administrator',
                'email'=>'myriam@epfc.com',
                'email_verified_at' => '2021-03-10 20:32:15',
                'password'=>'epfcepfc',
                'birthdate'=>'1992-01-30',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hi there, nice to meet you !',
            ],
            [
                'firstname'=>'Maja',
                'lastname'=>'Spelling',
                'role'=>'Guide',
                'email'=>'just.maja@epfc.com',
                'email_verified_at' => '2021-05-05 10:55:50',
                'password'=>'epfcepfc',
                'birthdate'=>'1992-03-25',
                'gender'=>'Female',
                'country'=>'England',
                'city'=>'London',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hi ! I\'m a very passionate traveller. 
                            Join me to discover the secrets of London and Let\'s have some fun in the most uncommon places.',
            ],
            [
                'firstname'=>'Georges',
                'lastname'=>'De La Jungle',
                'role'=>'Traveler',
                'email'=>'georges@epfc.com',
                'email_verified_at' => '2021-07-31 23:57:02',
                'password'=>'epfcepfc',
                'birthdate'=>'1995-10-12',
                'gender'=>'Male',
                'country'=>'Ireland',
                'city'=>'Dublin',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hi ! I\'m a very passionate traveller. Let\' join me to discover secrets places and Live through my city\'s legends',
            ],
            [
                'firstname'=>'Amélie',
                'lastname'=>'Poulard',
                'role'=>'Traveler',
                'email'=>'amelie@epfc.com',
                'email_verified_at'=>'2021-08-01 00:00:23',
                'password'=>'epfcepfc',
                'birthdate'=>'1994-11-20',
                'gender'=>'Female',
                'country'=>'France',
                'city'=>'Paris',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hi ! I\'m Amélie and I\' a frenchie. I travel across the world whenever I can. I can show you all the hidden places in Paris.  
                            And yes, there are still nuggets that are not well known by the general public!
                            Forget the big chain restaurants, I\'ll take you to the best places, 
                            the ones that use local products and keep the small neighborhoods alive.',
            ],
            [
                'firstname'=>'Ron',
                'lastname'=>'Weasley',
                'role'=>'Guide',
                'email'=>'ronald@epfc.com',
                'email_verified_at'=>'2021-06-01 00:02:28',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-12-1',
                'gender'=>'Male',
                'country'=>'England',
                'city'=>'London',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello there ! I\'m Ronald and I have a lot to show you around London. 
                            I have a lot of experience with guided tours. I can explain the history of almost all monuments, historical sites of the city. 
                            And I am a Harry Potter fan!',
            ],
            [
                'firstname'=>'Hilda',
                'lastname'=>'Stenberg',
                'role'=>'Guide',
                'email'=>'hilda@epfc.com',
                'email_verified_at'=>'2021-05-22 00:04:35',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-12-12',
                'gender'=>'Female',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello ! Discover Denmark through the passionate eyes of a Viking descendant.
                             I will tell you the true story of the little mermaid and show you the places related to her.',
            ],
            [
                'firstname'=>'Maria',
                'lastname'=>'Eduardo',
                'role'=>'Traveler',
                'email'=>'mariaEd@epfc.com',
                'email_verified_at'=>'2021-07-01 18:56:23',
                'password'=>'epfcepfc',
                'birthdate'=>'1986-09-13',
                'gender'=>'Female',
                'country'=>'Spain',
                'city'=>'Madrid',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello ! I am Maria and I\'m a florist and dancer in my free time. I would like to show you the best places in Madrid. 
                            I love music and I would recommend you the best bars that host on their stages the best undeground singers of the country!',
            ],
            [
                'firstname'=>'Peter',
                'lastname'=>'Darling',
                'role'=>'Traveler',
                'email'=>'p.darling@epfc.com',
                'email_verified_at'=>'2021-07-02 18:00:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-08-26',
                'gender'=>'Male',
                'country'=>'England',
                'city'=>'Manchester',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Nice to meet you, I\'m Peter! I\'m a journalist and in my spare time I\'d like to show you around my city,
                             Manchester. It has some incredible treasures and there are many activities for all ages throughout the year.',
            ],
            [
                'firstname'=>'Arun',
                'lastname'=>'Mahmod',
                'role'=>'Guide',
                'email'=>'arun@epfc.com',
                'email_verified_at'=>'2021-06-05 14:15:03',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-01-02',
                'gender'=>'Male',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hey ! I am Arun, a dane with a passion for nature! But who isn\'t?
                             I\'d be happy to show you the most beautiful hiking routes that offer, in addition, the most beautiful views of Copenhagen.',
            ],
            [
                'firstname'=>'Maya',
                'lastname'=>'Sorensen',
                'role'=>'Traveler',
                'email'=>'maya02@epfc.com',
                'email_verified_at'=>'2021-06-29 10:32:13',
                'password'=>'epfcepfc',
                'birthdate'=>'1998-02-15',
                'gender'=>'Female',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hey you ! I am Maya and I am an art student at the University of Copenhagen. 
                            I know all the good places in the city and the best store selling woolen items from a small farm not far from the city.',
            ],
            [
                'firstname'=>'Roberto',
                'lastname'=>'Ricci',
                'role'=>'Guide',
                'email'=>'ricciR@epfc.com',
                'email_verified_at'=>'2021-05-30 20:25:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1999-03-16',
                'gender'=>'Male',
                'country'=>'Italy',
                'city'=>'Florence',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello ! I\'m Roberto and I\'m an Italian who\'s not a big fan of spagetthis (sorry).
                             But I love Florence and its history and it is this fascination that made me want to study history and art! 
                             Come back in time with me, you won\'t regret it!',
            ],
            [
                'firstname'=>'Raphaelo',
                'lastname'=>'Nutella',
                'role'=>'Guide',
                'email'=>'tucciR@epfc.com',
                'email_verified_at'=>'2021-04-28 19:55:10',
                'password'=>'epfcepfc',
                'birthdate'=>'1989-10-17',
                'gender'=>'Male',
                'country'=>'Italy',
                'city'=>'Florence',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello ! I\'m Rapahelo and I love pizza! But who doesn\'t ?
                             I\'m a designer and I\'d like to show you the most beautiful and affordable clothes stores, unique pieces in unique places! ',
            ],
            [
                'firstname'=>'Nadia',
                'lastname'=>'Gonzales',
                'role'=>'Traveler',
                'email'=>'nadiaR@epfc.com',
                'email_verified_at'=>'2021-06-30 22:44:23',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-04-21',
                'gender'=>'Female',
                'country'=>'Portugal',
                'city'=>'Porto',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello !',
            ],
            [
                'firstname'=>'Nora',
                'lastname'=>'Jones',
                'role'=>'Guide',
                'email'=>'nora@epfc.com',
                'email_verified_at'=>'2021-06-26 22:26:09',
                'password'=>'epfcepfc',
                'birthdate'=>'1995-02-14',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello There, I am Rachida, young student in Computer Science in Brussels. I\'ll take you where the fun is guaranteed! 
                Between virtual reality and climbing in the heart of the city, you will have the choice! 
                I know the places where you can eat well without paying much ! It\'s up to you!',
            ],
            [
                'firstname'=>'Rachida',
                'lastname'=>'Salama',
                'role'=>'Moderator',
                'email'=>'rachida@epfc.com',
                'email_verified_at'=>'2021-07-10 21:50:25',
                'password'=>'epfcepfc',
                'birthdate'=>'1997-04-30',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'uploads/profile/women.png',
                'about_me'=>'Hello !',
            ],
        ];

        //Insert data in the table
        foreach ($users as $data) {  
            DB::table('users')->insert([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'role' => $data['role'],
                'email' => $data['email'],  
                'email_verified_at' => $data['email_verified_at'],
                'password' => Hash::make($data['password']), 
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'country' => $data['country'],
                'city' => $data['city'],
                'picture' => $data['picture'],
                'about_me' => $data['about_me'],
            ]);
        }
    }
}
