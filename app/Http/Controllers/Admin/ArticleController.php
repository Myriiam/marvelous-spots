<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllNewArticles()
    {
        //afficher la liste des nouveaux articles créés par les users
        //afficher les boutons pour accepter ou refuser
        $newArticles = DB::table('articles as art')
        ->select('art.id', 'art.title', 'art.user_id', 'art.status', 'u.firstname', 'u.lastname', 'u.city', 'art.created_at')
        ->join('users as u', 'u.id', '=', 'art.user_id')
        ->where('art.status', '=', 'under_review')
        ->get();

        return view('admin.articles.new-article',[
       
            'resource' => 'New articles to approve',
            'newArticles' => $newArticles,
          
        ]);
    }

    /**
     * Published the submitted article of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function acceptArticle($id)
    {
        //Si accepter, changer le status de l'article.
        //Envoyer un email
    }

    /**
     * Unpublished the submitted article of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function refuseArticle($id)
    {
         //Si refuser, supprimer les photos de l'article (table picture) et les catégories (table article_category) + changer le status de 
        //l'article en unpublished.
        //Envoyer un email si ok et si refus (pour prévenir le user)
        
    }

    /**
     * Display the details of the submitted article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
        //
    }

   
}
