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
                'email_verified_at' => '2020-01-29 14:31:02',
                'password'=>'epfcepfc',
                'birthdate'=>'1992-01-30',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'storage/app/public/uploads/users/1/avatar/myriam.jpg',
                'about_me'=>'Hi there, nice to meet you ! I\'m the administrator',
                'created_at'=>'2020-01-29 14:30:55'
            ],
            [
                'firstname'=>'Maja',
                'lastname'=>'Spelling',
                'role'=>'Guide',
                'email'=>'just.maja@epfc.com',
                'email_verified_at' => '2021-05-20 17:21:43',
                'password'=>'epfcepfc',
                'birthdate'=>'1992-03-25',
                'gender'=>'Female',
                'country'=>'England',
                'city'=>'London',
                'picture'=>'storage/app/public/uploads/users/2/avatar/maja.jpg',
                'about_me'=>'Hi ! I\'m a very passionate traveller. 
                            Join me to discover the secrets of London and Let\'s have some fun in the most uncommon places.',
                'created_at'=>'2021-05-20 17:20:42'
            ],
            [
                'firstname'=>'Georges',
                'lastname'=>'De La Jungle',
                'role'=>'Traveler',
                'email'=>'georges@epfc.com',
                'email_verified_at' =>'2021-06-25 15:22:03',
                'password'=>'epfcepfc',
                'birthdate'=>'1995-10-12',
                'gender'=>'Male',
                'country'=>'Ireland',
                'city'=>'Dublin',
                'picture'=>'storage/app/public/uploads/users/3/avatar/goerges.jpg',
                'about_me'=>'Hi ! I\'m a very passionate traveller. Let\' join me to discover secrets places and Live through my city\'s legends',
                'created_at'=>'2021-06-25 15:20:00'
            ],
            [
                'firstname'=>'Amélie',
                'lastname'=>'Poulard',
                'role'=>'Traveler',
                'email'=>'amelie@epfc.com',
                'email_verified_at'=>'2021-08-01 23:54:23',
                'password'=>'epfcepfc',
                'birthdate'=>'1994-11-20',
                'gender'=>'Female',
                'country'=>'France',
                'city'=>'Paris',
                'picture'=>'storage/app/public/uploads/users/4/avatar/amelie.jpg',
                'about_me'=>'Hi ! I\'m Amélie and I\' a frenchie. I travel across the world whenever I can. I can show you all the hidden places in Paris.  
                            And yes, there are still nuggets that are not well known by the general public!
                            Forget the big chain restaurants, I\'ll take you to the best places, 
                            the ones that use local products and keep the small neighborhoods alive.',
                'created_at'=>'2021-08-01 23:50:13'
            ],
            [
                'firstname'=>'Ron',
                'lastname'=>'Weasley',
                'role'=>'Guide',
                'email'=>'ronald@epfc.com',
                'email_verified_at'=>'2021-06-01 11:33:46',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-12-1',
                'gender'=>'Male',
                'country'=>'England',
                'city'=>'London',
                'picture'=>'storage/app/public/uploads/users/5/avatar/ron.jpg',
                'about_me'=>'Hello there ! I\'m Ronald and I have a lot to show you around London. 
                            I have a lot of experience with guided tours. I can explain the history of almost all monuments, historical sites of the city. 
                            And I am a Harry Potter fan!',
                'created_at'=>'2021-06-01 11:32:42'
            ],
            [
                'firstname'=>'Hilda',
                'lastname'=>'Stenberg',
                'role'=>'Guide',
                'email'=>'hilda@epfc.com',
                'email_verified_at'=>'2021-04-30 17:22:04',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-12-12',
                'gender'=>'Female',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'storage/app/public/uploads/users/6/avatar/hilda.jpg',
                'about_me'=>'Hello ! Discover Denmark through the passionate eyes of a Viking descendant.
                             I will tell you the true story of the little mermaid and show you the places related to her.',
                'created_at'=>'2021-04-30 17:20:42'
            ],
            [
                'firstname'=>'Maria',
                'lastname'=>'Eduardo',
                'role'=>'Traveler',
                'email'=>'mariaEd@epfc.com',
                'email_verified_at'=>'2021-07-20 18:12:26',
                'password'=>'epfcepfc',
                'birthdate'=>'1986-09-13',
                'gender'=>'Female',
                'country'=>'Spain',
                'city'=>'Madrid',
                'picture'=>'storage/app/public/uploads/users/7/avatar/maria.jpg',
                'about_me'=>'Hello ! I am Maria and I\'m a florist and dancer in my free time. I would like to show you the best places in Madrid. 
                            I love music and I would recommend you the best bars that host on their stages the best undeground singers of the country!',
                'created_at'=>'2021-07-20 18:11:00'
                ],
            [
                'firstname'=>'Peter',
                'lastname'=>'Darling',
                'role'=>'Traveler',
                'email'=>'p.darling@epfc.com',
                'email_verified_at'=>'2021-07-02 18:02:03',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-08-26',
                'gender'=>'Male',
                'country'=>'England',
                'city'=>'Manchester',
                'picture'=>'storage/app/public/uploads/users/8/avatar/peter.jpg',
                'about_me'=>'Nice to meet you, I\'m Peter! I\'m a journalist and in my spare time I\'d like to show you around my city,
                             Manchester. It has some incredible treasures and there are many activities for all ages throughout the year.',
                'created_at'=>'2021-07-02 18:00:00'
            ],
            [
                'firstname'=>'Arun',
                'lastname'=>'Mahmod',
                'role'=>'Guide',
                'email'=>'arun@epfc.com',
                'email_verified_at'=>'2021-06-02 13:16:07',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-01-02',
                'gender'=>'Male',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'storage/app/public/uploads/users/9/avatar/arun.jpg',
                'about_me'=>'Hey ! I am Arun, a dane with a passion for nature! But who isn\'t?
                             I\'d be happy to show you the most beautiful hiking routes that offer, in addition, the most beautiful views of Copenhagen.',
                'created_at'=>'2021-06-02 13:15:03'
            ],
            [
                'firstname'=>'Maya',
                'lastname'=>'Sorensen',
                'role'=>'Traveler',
                'email'=>'maya02@epfc.com',
                'email_verified_at'=>'2021-07-12 21:23:06',
                'password'=>'epfcepfc',
                'birthdate'=>'1998-02-15',
                'gender'=>'Female',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'storage/app/public/uploads/users/10/avatar/maya.jpg',
                'about_me'=>'Hey you ! I am Maya and I am an art student at the University of Copenhagen. 
                            I know all the good places in the city and the best store selling woolen items from a small farm not far from the city.',
                'created_at'=>'2021-07-12 21:20:22'
            ],
            [
                'firstname'=>'Roberto',
                'lastname'=>'Ricci',
                'role'=>'Guide',
                'email'=>'ricciR@epfc.com',
                'email_verified_at'=>'2021-06-23 14:32:26',
                'password'=>'epfcepfc',
                'birthdate'=>'1999-03-16',
                'gender'=>'Male',
                'country'=>'Italy',
                'city'=>'Florence',
                'picture'=>'storage/app/public/uploads/users/11/avatar/roberto.jpg',
                'about_me'=>'Hello ! I\'m Roberto and I\'m an Italian who\'s not a big fan of spagetthis (sorry).
                             But I love Florence and its history and it is this fascination that made me want to study history and art! 
                             Come back in time with me, you won\'t regret it!',
                'created_at'=>'2021-06-23 14:31:12'
            ],
            [
                'firstname'=>'Raphaelo',
                'lastname'=>'Nutella',
                'role'=>'Guide',
                'email'=>'tucciR@epfc.com',
                'email_verified_at'=>'2021-04-28 19:57:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1989-10-17',
                'gender'=>'Male',
                'country'=>'Italy',
                'city'=>'Florence',
                'picture'=>'storage/app/public/uploads/users/12/avatar/raphaelo.jpg',
                'about_me'=>'Hello ! I\'m Rapahelo and I love pizza! But who doesn\'t ?
                             I\'m a designer and I\'d like to show you the most beautiful and affordable clothes stores, unique pieces in unique places! ',
                'created_at'=>'2021-04-28 19:55:10'
            ],
            [
                'firstname'=>'Nadia',
                'lastname'=>'Gonzales',
                'role'=>'Traveler',
                'email'=>'nadiaR@epfc.com',
                'email_verified_at'=>'2021-05-13 22:58:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-04-21',
                'gender'=>'Female',
                'country'=>'Portugal',
                'city'=>'Porto',
                'picture'=>'storage/app/public/uploads/users/13/avatar/nadia.jpg',
                'about_me'=>'Hello !',
                'created_at'=>'2021-05-13 22:56:52'
            ],
            [
                'firstname'=>'Nora',
                'lastname'=>'Jones',
                'role'=>'Guide',
                'email'=>'nora@epfc.com',
                'email_verified_at'=>'2021-06-09 20:16:40',
                'password'=>'epfcepfc',
                'birthdate'=>'1995-02-14',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'storage/app/public/uploads/users/14/avatar/nora.jpg',
                'about_me'=>'Hello There, I am Nora, young student in Computer Science in Brussels. I\'ll take you where the fun is guaranteed! 
                Between virtual reality and climbing in the heart of the city, you will have the choice! 
                I know the places where you can eat well without paying much ! It\'s up to you!',
                'created_at'=>'2021-06-09 20:15:40'
            ],
            [
                'firstname'=>'Amal',
                'lastname'=>'Salama',
                'role'=>'Moderator',
                'email'=>'amal@epfc.com',
                'email_verified_at'=>'2021-02-01 11:31:11',
                'password'=>'epfcepfc',
                'birthdate'=>'1997-04-30',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'storage/app/public/uploads/users/15/avatar/amal.jpg',
                'about_me'=>'Hello I\'m Amal, the moderator !',
                'created_at'=>'2021-02-01 11:30:05'
            ],
            [
                'firstname'=>'Aminata',
                'lastname'=>'Koumbé',
                'role'=>'Guide',
                'email'=>'aminata@epfc.com',
                'email_verified_at'=>'2021-10-01 20:28:59',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-03-06',
                'gender'=>'Female',
                'country'=>'United Kingdom',
                'city'=>'London',
                'picture'=>'storage/app/public/uploads/users/16/avatar/aminata.jpg',
                'about_me'=>'Hello I\'m Aminata ! I enjoy discovering the world, meeting new people and sing in the rain...',
                'created_at'=>'2021-10-01 20:26:25'
            ],
            [
                'firstname'=>'Xi-Jung',
                'lastname'=>'Choo',
                'role'=>'Guide',
                'email'=>'xi@epfc.com',
                'email_verified_at'=>'2021-10-01 21:32:41',
                'password'=>'epfcepfc',
                'birthdate'=>'1983-02-15',
                'gender'=>'Male',
                'country'=>'United Kingdom',
                'city'=>'London',
                'picture'=>'storage/app/public/uploads/users/17/avatar/xi-Jun.jpg',
                'about_me'=>'Hello I\'m Xi-Jung but everybody calls me Xi ! I love food and I\'m good at cooking. 
                            I know my city like the back of my hand...',
                'created_at'=>'2021-10-01 21:30:20'
            ],
            [
                'firstname'=>'Daniel',
                'lastname'=>'LaRusso',
                'role'=>'Guide',
                'email'=>'daniL@epfc.com',
                'email_verified_at'=>'2020-07-01 21:35:18',
                'password'=>'epfcepfc',
                'birthdate'=>'1983-02-15',
                'gender'=>'Male',
                'country'=>'United States',
                'city'=>'Beverly Hills',
                'picture'=>'storage/app/public/uploads/users/18/avatar/dani.jpg',
                'about_me'=>'I\'m Daniel and I love karate ! I have a dojo in Beverly Hills and 
                            I would be glad to show you all the magical places here...',
                'created_at'=>'2021-07-01 21:33:20'
            ],
            [
                'firstname'=>'Jamila',
                'lastname'=>'Sadia',
                'role'=>'Guide',
                'email'=>'sadia@epfc.com',
                'email_verified_at'=>'2021-10-03 12:36:46',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-02-17',
                'gender'=>'Female',
                'country'=>'Spain',
                'city'=>'Madrid',
                'picture'=>'storage/app/public/uploads/users/19/avatar/jamila.jpg',
                'about_me'=>'Hello there ! Jamila is in the place. So if you like to have fun and learn a lot of things, you will
                            not be disapointed ! I know every places to go in Madrid !',
                'created_at'=>'2021-10-03 12:35:55'
            ],
            [
                'firstname'=>'Oliver',
                'lastname'=>'Matabomi',
                'role'=>'Guide',
                'email'=>'mataO@epfc.com',
                'email_verified_at'=>'2021-10-03 13:35:16',
                'password'=>'epfcepfc',
                'birthdate'=>'1991-01-29',
                'gender'=>'Male',
                'country'=>'France',
                'city'=>'Paris',
                'picture'=>'storage/app/public/uploads/users/20/avatar/oliver.jpg',
                'about_me'=>'I am Oliver, a passionate soccer of PSG fan. So you can guess I like sport and
                             more precisely team sport. It would be a pleasure to share my passion for both, travel and football...',
                'created_at'=>'2021-10-03 13:32:07'
            ],
            [
                'firstname'=>'Mehdi',
                'lastname'=>'Ghamadi',
                'role'=>'Guide',
                'email'=>'mehdiO@epfc.com',
                'email_verified_at'=>'2021-10-03 22:15:23',
                'password'=>'epfcepfc',
                'birthdate'=>'1995-12-02',
                'gender'=>'Male',
                'country'=>'France',
                'city'=>'Paris',
                'picture'=>'storage/app/public/uploads/users/21/avatar/mehdi.jpg',
                'about_me'=>"Hello my name is Mehdi, I love meeting new people and playing video games with them, 
                            but it's better in person. I know the best places to enjoy good music, especially outdoor shows in the summer.",
                'created_at'=>'2021-10-03 22:13:16'
            ],
            [
                'firstname'=>'Sally',
                'lastname'=>'Fanta',
                'role'=>'Guide',
                'email'=>'sallyO@epfc.com',
                'email_verified_at'=>'2021-10-02 20:21:59',
                'password'=>'epfcepfc',
                'birthdate'=>'1987-07-25',
                'gender'=>'Female',
                'country'=>'Portugal',
                'city'=>'Porto',
                'picture'=>'storage/app/public/uploads/users/22/avatar/sally.jpg',
                'about_me'=>"Hello you! I'm Sally and I've been living in Porto for 10 years now. 
                            It's a magical city that I'd love you to discover, you won't regret it.",
                'created_at'=>'2021-10-02 20:20:58'
            ],
            [
                'firstname'=>'Emma',
                'lastname'=>'O\'Hara',
                'role'=>'Guide',
                'email'=>'em@epfc.com',
                'email_verified_at'=>'2021-08-01 21:53:36',
                'password'=>'epfcepfc',
                'birthdate'=>'1993-08-25',
                'gender'=>'Female',
                'country'=>'Ireland',
                'city'=>'Dublin',
                'picture'=>'storage/app/public/uploads/users/23/avatar/emma.jpg',
                'about_me'=>"Hello I'm Emma ! To discover the world, it is necessary to be open to others. And that's what I like about traveling.To visit Dublin,it is therefore important to leave with this state of mind,
                            to reconnect with your childhood soul to better understand the legends and history that founded it.",
                'created_at'=>'2021-08-01 21:52:58'
            ],
            [
                'firstname'=>'Jorgen',
                'lastname'=>'Larsen',
                'role'=>'Guide',
                'email'=>'jorgen@epfc.com',
                'email_verified_at'=>'2021-08-01 21:48:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1978-06-30',
                'gender'=>'Male',
                'country'=>'Denmark',
                'city'=>'Copenhagen',
                'picture'=>'storage/app/public/uploads/users/24/avatar/jorgen.jpg',
                'about_me'=>"Hi, I'm Jorgen and I work as a fisherman in Copenhagen. 
                            In my spare time I like to share my passion about the history of my city.
                            I also know the best bars and restaurants where you can eat well and cheaply.",
                'created_at'=>'2021-08-01 21:45:58'
            ],
            [
                'firstname'=>'Lucia',
                'lastname'=>'Bianchi',
                'role'=>'Traveler',
                'email'=>'lucia@epfc.com',
                'email_verified_at'=>'2021-08-22 23:53:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1990-07-21',
                'gender'=>'Female',
                'country'=>'Italy',
                'city'=>'Rome',
                'picture'=>'storage/app/public/uploads/users/25/avatar/lucia.jpg',
                'about_me'=>"Hi, I'm Lucia ! I work in human resources and 
                            I like to enjoy my evenings with my friends dancing and drinking. I know the best bars in the city.",
                'created_at'=>'2021-08-22 23:50:58'
            ],
            [
                'firstname'=>'Martha',
                'lastname'=>'Estebano',
                'role'=>'Traveler',
                'email'=>'martha@epfc.com',
                'email_verified_at'=>'2021-08-25 22:42:43',
                'password'=>'epfcepfc',
                'birthdate'=>'1982-06-30',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Antwerpen',
                'picture'=>'storage/app/public/uploads/users/26/avatar/martha.jpg',
                'about_me'=>"Hello there, I'm Martha. I am a web designer in a small Belgian company. 
                            I like to go horseback riding to recharge my batteries. I will advise you on the best places to visit in Antwerpen.",
                'created_at'=>'2021-08-25 22:41:58'
            ],
            [
                'firstname'=>'Carlos',
                'lastname'=>'Esperanza',
                'role'=>'Guide',
                'email'=>'carlos@epfc.com',
                'email_verified_at'=>'2021-08-22 19:32:00',
                'password'=>'epfcepfc',
                'birthdate'=>'1987-05-24',
                'gender'=>'Male',
                'country'=>'Spain',
                'city'=>'Madrid',
                'picture'=>'storage/app/public/uploads/users/27/avatar/carlos.jpg',
                'about_me'=>"Hello there, I am Carlos and I am a lover of Madrid, which I know like the back of my hand.
                            Being born here, it still amazes me every day. I love cooking and I practice skateboard and surf.",
                'created_at'=>'2021-08-22 19:30:05'
            ],
            [
                'firstname'=>'Ju Jin',
                'lastname'=>'Kim',
                'role'=>'Guide',
                'email'=>'ju@epfc.com',
                'email_verified_at'=>'2021-04-10 18:58:40',
                'password'=>'epfcepfc',
                'birthdate'=>'1988-02-23',
                'gender'=>'Female',
                'country'=>'Belgium',
                'city'=>'Brussels',
                'picture'=>'storage/app/public/uploads/users/28/avatar/ju.jpg',
                'about_me'=>"Hello, I am Ju Jin (or just Ju is fine) ! I run a small café in Brussels that offers delicious treats. I often organize baking classes 
                            there in addition to taking yoga classes. Come and meet me, I would be a perfect guide.",
                'created_at'=>'2021-04-10 19:00:05'
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
                'created_at' => $data['created_at'],
            ]);
        }
    }
}
