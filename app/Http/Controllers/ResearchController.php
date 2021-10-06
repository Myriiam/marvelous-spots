<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
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
        $languages = Language::all();
        if ($request->btnSearch === 'guides') {  //mettre d'abord  if !is_null et puis les btn et puis le else si city is_null
            if (!is_null($city)) {
                $guides = User::researchGuides($city)->paginate(6);

                return view('researches.result-guides', [
                    'guides' => $guides,
                    'categories' => $categories,
                    'city' => $city,
                    'languages' => $languages,
                ]);
            }
        } else if ($request->btnSearch === 'articles') {
            if (!is_null($city)) {
             /*   $articles = Article::researchArticles($city)->paginate(3);

                foreach ($articles as $article) {
                    $article->categories = DB::table('categories as cat')->select('cat.name')
                        ->join('article_category as artcat', 'artcat.category_id', '=', 'cat.id')
                        ->where('artcat.article_id', '=', $article->id)->get();
                }*/

                 $userIds = DB::table('users')->where('city', '=', $city)->get();
                 $articles = new Collection();
                 foreach ($userIds as $userId) {
                     //dd($articleId);
                    $articles = $articles->concat(
                      Article::where('status', '=', 'published')->where('user_id', '=', $userId->id)->get()
                    );
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
        $languages = Language::all();

        if (!is_null($city)) {
        
            if ($request->btnSubmit === 'guides')  {
            $guides = User::researchGuides($city);
            
            if ($request->has('categories') && $request->has('languages') && $request->has('gender')) {
                $guides->join('category_guide as catg', 'catg.guide_id', '=', 'guides.id')
                ->join('categories as cat', 'catg.category_id', '=', 'cat.id')
                ->join('guide_language as langui', 'langui.guide_id', '=', 'guides.id')            
                ->join('languages as lang', 'lang.id', '=', 'langui.language_id')
                ->when($request->categories, function ($query, $cat) {
                return $query->whereIn('cat.id', $cat);
                })->when($request->languages, function ($query, $languages) {
                return $query->whereIn('lang.id', $languages);
                })->when($request->gender, function ($query, $gender) {
                return $query->whereIn('gender', $gender);
                });

            } else if ($request->has('categories') && $request->has('languages')) {
                $guides->join('category_guide as catg', 'catg.guide_id', '=', 'guides.id')
                 ->join('categories as cat', 'catg.category_id', '=', 'cat.id')
                 ->join('guide_language as langui', 'langui.guide_id', '=', 'guides.id')            
                 ->join('languages as lang', 'lang.id', '=', 'langui.language_id')
                 ->when($request->categories, function ($query, $cat) {
                 return $query->whereIn('cat.id', $cat);
                 })->when($request->languages, function ($query, $languages) {
                 return $query->whereIn('lang.id', $languages);
                 });
            } else if ($request->has('gender') && $request->has('languages')) {
                 $guides->join('guide_language as langui', 'langui.guide_id', '=', 'guides.id')            
                 ->join('languages as lang', 'lang.id', '=', 'langui.language_id')
                 ->when($request->languages, function ($query, $languages) {
                 return $query->whereIn('lang.id', $languages);
                 })->when($request->gender, function ($query, $gender) {
                 return $query->whereIn('gender', $gender);
                 });
            } else if ($request->has('gender') && $request->has('categories')) {
                 $guides->join('category_guide as catg', 'catg.guide_id', '=', 'guides.id')
                 ->join('categories as cat', 'catg.category_id', '=', 'cat.id')
                 ->when($request->categories, function ($query, $cat) {
                 return $query->whereIn('cat.id', $cat);
                 })->when($request->gender, function ($query, $gender) {
                 return $query->whereIn('gender', $gender);
                 });
            } else if ($request->has('categories')) {
                $guides->join('category_guide as catg', 'catg.guide_id', '=', 'guides.id')
                ->join('categories as cat', 'catg.category_id', '=', 'cat.id')
                ->when($request->categories, function ($query, $cat) {
                    return $query->whereIn('cat.id', $cat);
                });
            } else if ($request->has('languages')) {
                $guides->join('guide_language as langui', 'langui.guide_id', '=', 'guides.id')            
                ->join('languages as lang', 'lang.id', '=', 'langui.language_id')
                ->when($request->languages, function ($query, $languages) {
                return $query->whereIn('lang.id', $languages);
                });
            } else if ($request->has('gender')) {
                $guides->when($request->gender, function ($query, $gender) {
                    return $query->whereIn('gender', $gender);
                });
            
            }

            $guides = $guides->paginate(6);
               
            return view('researches.result-guides', [
                'guides' => $guides,
                'categories' => $categories,
                'city' => $city,
                'languages' => $languages,
            ]);
        }
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
            if (!is_null($city)) {
                if (!$request->has('categories')) {
                    $userIds = DB::table('users')->where('city', '=', $city)->get();
                    $articles = new Collection();
                    foreach ($userIds as $userId) {
                        //dd($articleId);
                       $articles = $articles->concat(
                         Article::where('status', '=', 'published')->where('user_id', '=', $userId->id)->get()
                       );
                    }
                }

                if ($request->has('categories')) {
                /*    $articles = Article::researchArticles($city)->paginate(3);

                    foreach ($articles as $article) {
                        $article->categories = DB::table('categories as cat')->select('cat.name')
                            ->join('article_category as artcat', 'artcat.category_id', '=', 'cat.id')
                            ->where('artcat.article_id', '=', $article->id)
                            ->whereIn('cat.id', $cat)->get();
                           // dd($article);
                    } */
                    $articleIds = DB::table('article_category')->whereIn('category_id', $request->categories)->get();
                    //dd($articleIds);
                    $articles = new Collection();
                    foreach ($articleIds as $articleId) {
                        $articles = $articles->concat(
                        Article::where('status', '=', 'published')->where('id', '=', $articleId->article_id)->get()
                        );
                    }

                }

                return view('researches.result-articles', [
                    'articles' => $articles,
                    'categories' => $categories,
                    'city' => $city,
                ]);
            }
        }
    }
}
