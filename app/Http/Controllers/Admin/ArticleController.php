<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
            ->where('art.status', '=', 'under_review')->paginate(3, ['*'], 'under_review');
       
        $unpublishedArticles = DB::table('articles as art')
            ->select('art.id', 'art.title', 'art.user_id', 'art.status', 'u.firstname', 'u.lastname', 'u.city', 'art.created_at')
            ->join('users as u', 'u.id', '=', 'art.user_id')
            ->where('art.status', '=', 'unpublished')->paginate(1, ['*'], 'unpublished');
      
        $publishedArticles = DB::table('articles as art')
            ->select('art.id', 'art.title', 'art.user_id', 'art.status', 'u.firstname', 'u.lastname', 'u.city', 'art.created_at')
            ->join('users as u', 'u.id', '=', 'art.user_id')
            ->where('art.status', '=', 'published')->paginate(2, ['*'], 'published');

        return view('admin.articles.new-article',[
       
            'resource' => 'New articles to approve',
            'newArticles' => $newArticles,
            'unpublishedArticles' => $unpublishedArticles,
            'publishedArticles' => $publishedArticles,
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
        $article = Article::find($id);
        //Si accepter, changer le status de l'article.
        if ($article->status === 'under_review') {
            $article->update([
                'status' => 'published',
            ]);
      
            //Envoyer un email
            Mail::send('admin.articles.email-acceptance', ['article' => $article],
            function($message) use ($article) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($article->user->email, $article->user->firstname)->subject('Your submitted article : '. $article->title);
            });

            return redirect()->route('new_article')
            ->with('success', 'Your have approved the article and an email has been sent to ' .$article->user->firstname. ' !');
        }

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
        $article = Article::find($id);

        if ($article->status === 'under_review') {
            //Ajouter la date since_when + changer status pending => accepted
           $article->update([
                 'status' => 'unpublished',  //Ajouter 1 champs pour savoir qd l'admin a refuser la requête ?
             ]);

            //Supprimer les categories et les pictures de l'article
            $picturesArticle = $article->pictures;

            foreach ($picturesArticle as $picture) {
                unlink($picture->path);
            }

            $article->pictures()->delete();
            $article->categories()->detach();

            //Send a rejection email to the user
            Mail::send('admin.articles.email-rejection', ['article' => $article],
            function($message) use ($article) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($article->user->email, $article->user->firstname)->subject('Your submitted article : '. $article->title);
            });

            return redirect()->route('new_article')
            ->with('success', 'Your have rejected the article and an email has been sent to ' .$article->user->firstname. ' !');
        }
    }
   
}
