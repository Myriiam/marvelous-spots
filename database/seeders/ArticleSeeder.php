<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'user_id'=>2,
                'title'=>'What can we do in a rainy day London',
                'subtitle'=>'A list of some places to go in the centrum',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. 
                                Nullam ligula nunc, tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac.
                                Donec congue tellus sit amet ipsum fringilla, sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque. Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a lectus vitae, tincidunt molestie purus.
                                Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' =>null,
                'website_place'=>null,
                'address'=>'In the centrum of London',
                'status'=>'under_review',
                'created_at' =>'2021-06-30 15:40:05'
            ],
            [
                'user_id'=>6,
                'title'=>'Under the sea in the city',
                'subtitle'=>'The country\'s largest aquarium',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros.
                                Nullam ligula nunc, tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. 
                                Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, sit amet tempus eros condimentum.
                                Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque. Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, 
                                tempus a lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' => '+45012384594',
                'website_place'=>'www.copen-aqua.com',
                'address'=>'Tuborg Havnepark 15, 2900 Hellerup, Danemark',
                'status'=>'published',
                'created_at' =>'2021-08-25 11:30:55'
            ],
            [
                'user_id'=>9,
                'title'=>'The good Restaurant',
                'subtitle'=>'An incredible place to eat good food',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros.
                                Nullam ligula nunc, tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. 
                                Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, sit amet tempus eros condimentum. 
                                Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque. Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae,
                                bibendum sem. Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa.
                                Proin nunc nulla, tempus a lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' => '+4589563261',
                'website_place'=>'www.thegood.com',
                'address'=>'Plouggårdsvej 16, 4653 Copenhagen',
                'status'=>'published',
                'created_at' =>'2021-06-29 20:05:52'
            ],
            [
                'user_id'=>5,
                'title'=>'Shopping for a good cause',
                'subtitle'=>'A store like no other - come to say Hi to Martha',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' => '+0759458623',
                'website_place'=>'www.shopwithmartha.com',
                'address'=>'41 Marlborough Crescent EX20 7GP',
                'status'=>'published',
                'created_at' =>'2021-06-23 14:30:55'
            ],
            [
                'user_id'=>9,
                'title'=>'Top 5 best restaurants in Copenhagen',
                'subtitle'=>'Eating without breaking the bank',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' =>null,
                'website_place'=>null,
                'address'=>'in the area of Rådhuset 1599 København V',
                'status'=>'published',
                'created_at' =>'2020-08-12 18:45:15'
            ],
            [
                'user_id'=>9,
                'title'=>'The best place for kayaking',
                'subtitle'=>'Sandkaj Harbour Bath',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' =>null,
                'website_place'=>null,
                'address'=>'in the area of Rådhuset 1596 Norhavn',
                'status'=>'published',
                'created_at' =>'2020-08-23 19:12:11'
            ],
            [
                'user_id'=>9,
                'title'=>'Hiking in the hills of Svanemølle',
                'subtitle'=>'The legends of the Vikings',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' =>null,
                'website_place'=>null,
                'address'=>'Svanemølle 1590 near Tisvilde village',
                'status'=>'under_review',
                'created_at' =>'2020-10-01 21:45:14'
            ],
            [
                'user_id'=>5,
                'title'=>'The rooftop to see in 2022',
                'subtitle'=>'Breathtaking landscape guaranteed',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque purus odio, maximus rhoncus ornare id, ultricies sed eros. Nullam ligula nunc, 
                                tempus in commodo sit amet, porttitor et lectus. Quisque consequat mi in justo lacinia tincidunt. Donec rhoncus justo massa, non mollis nisi vestibulum ac. Donec congue tellus sit amet ipsum fringilla, 
                                sit amet tempus eros condimentum. Sed ac lectus sollicitudin, efficitur felis eget, accumsan neque.
                                Etiam consequat nec dolor id auctor. Aenean at metus molestie, vestibulum quam vitae, bibendum sem. 
                                Curabitur sit amet sollicitudin eros. Nullam hendrerit libero a diam euismod dictum. Maecenas elit nulla, aliquet a tempus vitae, iaculis vel massa. Proin nunc nulla, tempus a 
                                lectus vitae, tincidunt molestie purus. Sed iaculis vehicula leo, nec sodales lectus tincidunt non.',
                'phone_place' =>'+442041345678',
                'website_place'=>'www.roofview.com',
                'address'=>'in the area of Rådhuset 1596 Norhavn',
                'status'=>'published',
                'created_at' =>'2020-09-25 18:59:25'
            ],
        ];

         //Insert data in the table
         foreach ($articles as $data) {

            DB::table('articles')->insert([
                'user_id' => $data['user_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'description' => $data['description'],
                'phone_place' => $data['phone_place'],
                'website_place' => $data['website_place'],
                'address' => $data['address'],
                'status' => $data['status'],
                'created_at' => $data['created_at'],
            ]);
        }
    }
}
