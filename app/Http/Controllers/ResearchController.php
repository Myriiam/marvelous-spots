<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    /**
     * Display all the articles and guides of a city according to the search (when the user enter a city name).
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {   
        $city = $request->input('search-input', null);
        $categories = Category::all();
        if ($request->btnSearch === 'guides') {
           if (!is_null($city)) {
                $guides = User::researchGuides($city);
                //dd($guides);

                return view('researches.result-guides',[
                    'guides' => $guides,
                    'categories' => $categories,
                    'city' => $city,
                ]);
           }
        } else if ($request->btnSearch === 'articles') {
            if (!is_null($city)) {
               
                 $users = User::where('city', 'LIKE', "%{$city}%")->get();

                 foreach($users as $user) {
                    $user->articles = Article::where('user_id', '=', $user->id)->where('status', '=', 'published')->get();
                    
                    foreach($user->articles as $article) {
                        $author = User::find($article->user_id);
                        $article->author = $author->firstname;
                        $article->categories[] = $article->categories;
                    }
                 }

                 return view('researches.result-articles',[
                    'users' => $users,
                ]);
                
           }
        } else {
            return redirect()->route('welcome')->with('error', 'Veuillez remplir tous les champs !');
        }
        
        $users = User::all();
        $articles = Article::all();
        $bookings = Booking::all();
        $categories = Category::all();
           
           return view('researches.search',[
               'users' => $users,
               'articles' => $articles,
               'bookings' => $bookings,
               'categories' => $categories,
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
