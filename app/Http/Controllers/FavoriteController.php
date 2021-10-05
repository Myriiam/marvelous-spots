<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\FavoriteGuide;
use App\Models\ArticleFavorite;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the favorites (articles and guides).
     * 
     * @param int $id
     * @return void
     */
    public function getAllMyFavorites()
    {
        //Article
        $user = User::find(auth()->user()->id);
        //$nbLikesAboutAuthUser = $user->guide->likes; //Les likes reçus par le user auth
        $favoritesGuidesOfAuthUser = $user->likes;  //les guides favoris du user auth
        $favoritesArticlesOfAuthUser = $user->favorites;  //les articles favoris du user auth
        
        //Double join needed here
        //Find details about the favorites guides of the auth user
       /* $favoritesGuidesOfAuthUser = DB::table('favorite_guides')->join('guide', 'guide.id', '=', 'article_comments.guide_id')
        ->select('users.firstname', 'users.id','users.picture', 'article_comments.comment', 'article_comments.article_id',
         'article_comments.created_at')
        ->where(['article_comments.article_id'=>$id])
        ->get();*/

        //For articles
       /* $favoritesGuidesOfAuthUser = DB::table('favorite_guides')->join('guide', 'guide.id', '=', 'article_comments.guide_id')
        ->select('users.firstname', 'users.id','users.picture', 'article_comments.comment', 'article_comments.article_id',
         'article_comments.created_at')
        ->where(['article_comments.article_id'=>$id])
        ->get();*/

        return view('favorites.index',[
            'user' => $user,
            'favoritesGuidesOfAuthUser' => $favoritesGuidesOfAuthUser,
            'favoritesArticlesOfAuthUser' => $favoritesArticlesOfAuthUser,
        ]);

    }

    /**
     * Like an article.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeArticle($id)
    {
        $userId = auth()->user()->id; //Id of the authenticated user 
        $user = User::find($userId);
        $article = Article::find($id);
        $articleId = $article->id; //Id of the article
        
        //Count the number of like for this article
        //$nbLikes = $article->favorites->count();
       //dd($nbLikes);

        ArticleFavorite::create([
             'user_id' => $userId, 
             'article_id' => $articleId,
        ]);

        return redirect()->route('show_article', $articleId)
        ->with('success', 'This article has been mark as one of your favorites !');
    }

    /**
     * Dislike an article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dislikeArticle($id)
    {   //dd($id); //12

        //Id of the article
        $articleId = DB::table('article_favorites')->join('articles', 'articles.id', '=', 'article_favorites.article_id')
        ->select('articles.id')
        ->where(['article_favorites.id'=>$id])
        ->first();
    
        $favorite = ArticleFavorite::find($id); //the article marked as favorite
        $favorite->delete();

        return redirect()->route('show_article', $articleId->id)
            ->with('success','The article has been successfully deleted from your favorites !');
    }

    /**
     * Like a guide.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeGuide($id)
    {
        $userId = auth()->user()->id; //Id of the authenticated user 
       /* $guide = Guide::find($id);
        $guideId = $guide->id; //Id of the guide*/

       $user = User::find($id); //2
       $guideId = $user->guide->id;
      // dd($guideId);

        //dd($guideId);

        FavoriteGuide::create([
             'user_id' => $userId, 
             'guide_id' => $guideId,
        ]);

        return redirect()->route('profile', $user->id)
        ->with('success', 'This guide is now one of your favorites !');
    }

    /**
     * Dislike a guide.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dislikeGuide($id)
    {   
         //Id of the guide
         $UserIdOfGuide = DB::table('favorite_guides')->join('guides', 'guides.id', '=', 'favorite_guides.guide_id')
         ->select('guides.user_id')
         ->where(['favorite_guides.id'=>$id])
         ->first();

        $favoriteGuide = FavoriteGuide::find($id); //the guide marked as favorite
        $favoriteGuide->delete();

        return redirect()->route('profile', $UserIdOfGuide->user_id)
            ->with('success','This guide has been successfully deleted from your favorites !');
    }

}
