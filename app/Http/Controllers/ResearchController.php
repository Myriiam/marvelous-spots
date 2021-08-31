<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ResearchController extends Controller
{
    /**
     * Display all the articles and guides of a city according to the search (when the user enter a city name).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $city = $request->input('searchInput', null);
        $categories = Category::all();
        if ($request->btnSearch === 'guides') {
            if (!is_null($city)) {
                $guides = User::researchGuides($city)->paginate(2);

                return view('researches.result-guides', [
                    'guides' => $guides,
                    'categories' => $categories,
                    'city' => $city,
                ]);
            }
        } else if ($request->btnSearch === 'articles') {
            if (!is_null($city)) {
                $articles = DB::table('articles as art')
                    ->select('art.id', 'art.title', 'art.subtitle', 'art.user_id', 'art.status', 'u.firstname', 'u.picture', 'u.city', 'pic.path')
                    ->join('users as u', 'u.id', '=', 'art.user_id')
                    ->join('pictures as pic', 'pic.article_id', '=', 'art.id')
                    ->groupBy('art.id')
                    ->having('u.city', 'LIKE', "%{$city}%")
                    ->having('art.status', '=', 'published')
                    ->paginate(3);

                foreach ($articles as $article) {
                    $article->categories = DB::table('categories as cat')->select('cat.name')
                        ->join('article_category as artcat', 'artcat.category_id', '=', 'cat.id')
                        ->where('artcat.article_id', '=', $article->id)->get();
                }

                return view('researches.result-articles', [
                    'articles' => $articles,
                    'city' => $city,
                    'categories' => $categories,
                ]);
            }
        } /*else {
            return redirect()->route('welcome')->with('error', 'Veuillez remplir tous les champs !');
        }*/
    }

    /**
     * Filter guides once in the guides results page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterGuides(Request $request)
    {
        $city = $request->input('searchGuides', null);
        $categories = Category::all();
        if ($request->btnSubmit === 'guides') {
            if (!is_null($city)) {
                $guides = User::researchGuides($city);

                //Filter by categories
                if ($request->has('categories')) {
                    
                    $catCheckbox = $request->categories;
                    //dd($catCheckbox);
                    $guides = DB::table('users')
                            ->select('users.*', 'guides.*')->distinct('users.id')
                            ->join('guides', 'guides.user_id', '=', 'users.id')              
                            ->join('category_guide as catg', 'catg.guide_id', '=', 'guides.id')
                            ->join('categories as cat', 'catg.category_id', '=', 'cat.id')
                            ->where('role', '=', 'Guide')->where('city', 'LIKE', "%{$city}%")     
                            ->whereIn('cat.id', $catCheckbox);
                }
            
                //Filter by languages
                if ($request->has('lang')) {
                   //dd($request);
                    $langCheckbox = $request->lang;
                   //dd($langCheckbox);
                    $guides = DB::table('users')
                            ->select('users.*', 'guides.*')->distinct('users.id')
                            ->join('guides', 'guides.user_id', '=', 'users.id')              
                            ->join('languages as lang', 'lang.guide_id', '=', 'guides.id')
                            ->where('users.role', '=', 'Guide')->where('users.city', 'LIKE', "%{$city}%");     
                    foreach ($langCheckbox as $lang) {
                        $guides = $guides->where('lang.language','=', $lang);
                    }
                }

           // dd($guides);

                //Filter by gender
                if ($request->has('gender')) {
                    $genderCheckbox = $request->gender;
                    if (in_array("all", $genderCheckbox)) {
                        $guides = User::researchGuides($city);
                    } else {
                        $guides = User::researchGuides($city)
                            ->whereIn('users.gender', $genderCheckbox);
                    }
                }
            }
                $guides = $guides->paginate(2);

                return view('researches.result-guides', [
                    'guides' => $guides,
                    'categories' => $categories,
                    'city' => $city,
                ]);
        }
    }

    /**
     * Filter articles once in the articles results page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterArticles(Request $request)
    {
        $city = $request->input('searchArticles', null);
        $categories = Category::all();
        if ($request->btnSubmit === 'articles') {
            //dd($articles->get());
            if (!is_null($city)) {
                $articles = Article::researchArticles($city);
                if ($request->has('categories')) {
                    
                    $catArticlesCheckbox = $request->categories;
                    /*$articles = DB::table('articles as art')
                    ->select('art.id', 'art.title', 'art.subtitle', 'art.user_id', 'art.status', 'u.firstname', 'u.picture', 'u.city', 'pic.path')
                    ->join('users as u', 'u.id', '=', 'art.user_id')
                    ->join('pictures as pic', 'pic.article_id', '=', 'art.id')
                    ->groupBy('art.id')
                    ->having('u.city', 'LIKE', "%{$city}%")
                    ->having('art.status', '=', 'published');

                    foreach ($articles as $article) {
                        $article->categories = DB::table('categories as cat')->select('cat.name')
                            ->join('article_category as artcat', 'artcat.category_id', '=', 'cat.id')
                            ->where('artcat.article_id', '=', $article->id)
                            ->whereIn('cat.id', $catArticlesCheckbox);
                    }*/
                    $articles = Article::researchArticles($city)->whereIn('cat.id', $catArticlesCheckbox);
                }
            }

            $articles = $articles->paginate(3);

            return view('researches.result-articles', [
                'articles' => $articles,
                'categories' => $categories,
                'city' => $city,
            ]);
        }    
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
}
