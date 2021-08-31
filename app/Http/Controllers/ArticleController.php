<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ArticleComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArticle()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $categories = Category::all();

        return view('articles.add-form',[
            'user' => $user,
            'resource' => 'Write an article',
            'categories' => $categories
        ]);
       
    }

    /**
     * Store a newly created article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeArticle(Request $request)
    {
        // Validation 
        $request->validate([
            'title' => 'required|string|min:15|max:60',
            'subtitle' => 'required|string|min:15|max:60',
            'description' => 'required|string|min:80',
            //'latitude' => '',
            //'longitude' => '',
            'pictures' => 'required|min:2|max:6',
           // 'pictures.*' => 'array|mimes:png,jpg,jpeg',
            'website' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:15',
            'address' => 'required|string|max:60',
            'categories' => 'required|exists:categories,id|min:1',
           // 'categories.*' => 'required|exists:categories,id',
        ], ['pictures.min' => 'At least 2 pictures are required', 'pictures.max' => 'You can upload 6 pictures maximum',
            'categories.min' => 'You must choose 1 category at least']);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $article = new Article();
       // $latitude = $request->input('latitude');
       // $longitude = $request->input('longitude');
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $description = $request->input('description');
        $website = $request->input('website');
        $phone = $request->input('phone');
        $address = $request->input('address');

        //Enregistrer les datas dans la BDD
       // Article::create([
            $article->user_id = $user_id;
           // 'latitude' => $latitude,
           // 'longitude' => $longitude,
            $article->title = $title;
            $article->subtitle = $subtitle;
            $article->description = $description;
            $article->phone_place = $phone;
            $article->website_place = $website;
            $article->address = $address;
            $article->save();
        //]);

        //Pour ajouter et lier les catégories à l'article
        //$article->categories()->sync($request->input('categories'));
        $article->categories()->attach($request->categories);

        //Files pictures to add dans le dossier du user
        if($request->hasFile('pictures')) {
            $files = $request->file('pictures');
            $allowedfileExtension  =['jpg','png','jpeg'];

            foreach ($files as $file) {
               // $filename = time().'_'.$file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                 // File upload location
                if ($check) {
                    $location = 'storage/app/public/uploads/users';
                    $folder = $location .'/'. $user->id .'/articles/img/';

                    if(!file_exists($folder) && !is_dir($folder)){
                        mkdir($folder, 0777, true);
                    }
                    // Upload file
                    $file->move($folder,$filename);  
                    $article->pictures()->create([
                        'path' => $folder . $filename,
                    ]);
                } 
            }
        }
     
        $articles = $user->articles;
        $nbPublishedArticles =  $articles->where('status','=','published')->count();
       
        if ($nbPublishedArticles >= 3) {
            $article->update([
                'status' => 'published',
            ]);

            return redirect()->route('show_article', $article->id) 
                ->with('success', '
                Your article has been created and published successfully. 
                ');
        } else {
            return redirect()->route('show_article', $article->id) 
                ->with('success', '
                Your article has been created!
                We will analyze it to make sure that it meets the requirements. 
                Please note that it is not yet public but will be as soon as your article has been approved! 
                This restriction will no longer apply once you have posted more than 3 approved articles! 
                ');
        }
    }

    /**
     * Display all the articles written by a specific user (author).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllMyArticles($id)
    {
       //$user_id = auth()->user()->id;
        $user = User::find($id);
        $articles = $user->articles;
      
        return view('articles.index',[
            'articles' => $articles,
            'user' => $user,
            'resource' => 'My Articles',
        ]);
    }

    /**
     * Display the specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
        $article = Article::find($id);
        $pictures = $article->pictures;
        $categories = $article->categories;
        $user_id = $article->user_id;
        $author = User::find($user_id); //author of the article
        
        //Get all comments etc of the article
        //$comments = DB::table('article_comments')->where(['article_id'=>$id])->get();
        $comments = DB::table('article_comments')->join('users', 'users.id', '=', 'article_comments.user_id')
          ->select('users.firstname', 'users.id','users.picture', 'article_comments.comment', 'article_comments.article_id',
           'article_comments.created_at')
          ->where(['article_comments.article_id'=>$id])
          ->get();
        //dd($comments);
           
        //Count the number of comments for this article
        $nbComments = $article->comments->count();

        //Count the number of like for this article
        $nbLikes = $article->favorites->count();

        if (auth()->user()) {
            $userAuth = auth()->user()->id; //Id of the authenticated user 
            //To know if the authenticated user has already or not mark the post as favorite
            $liked = DB::table('article_favorites')->join('users', 'users.id', '=', 'article_favorites.user_id')
            ->select('users.firstname', 'users.id', 'article_favorites.id')
            ->where(['article_favorites.article_id'=>$id])
            ->where(['article_favorites.user_id'=>$userAuth])
            ->first();
            //dd($liked);

            return view('articles.show',[
                'article' => $article,
                'author' => $author, 
                'resource' => 'Article',
                'pictures' => $pictures,
                'categories' => $categories,
                'comments' => $comments,
                'nbLikes' => $nbLikes,
                'liked' => $liked,
                'nbComments' => $nbComments,
            ]);
        } else {
            return view('articles.show',[
                'article' => $article,
                'author' => $author, 
                'resource' => 'Article',
                'pictures' => $pictures,
                'categories' => $categories,
                'comments' => $comments,
                'nbLikes' => $nbLikes,
                'nbComments' => $nbComments,
            ]);
        }
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editArticle($id)
    {
        $article = Article::find($id);
        $pictures = $article->pictures;
        $selectedCat = [];
        foreach ($article->categories as $categoriesOfArticle) {
            array_push($selectedCat, $categoriesOfArticle->id);
        }
        
        $user_id = $article->user_id;
        $author = User::find($user_id);
        $categories = Category::all();
        //dd($author);

        return view('articles.edit',[
            'article' => $article,
            'author' => $author, 
            'pictures' => $pictures,
            'categoriesOfArticle' => $categoriesOfArticle,
            'categories' => $categories,
            'selectedCat' => $selectedCat,
            'resource' => 'Article editing form',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $article = Article::find($id);
    
       // Validation 
   /*    $request->validate([
        'title' => 'required|string|min:15|max:60',
        'subtitle' => 'required|string|min:15|max:60',
        'description' => 'required|string|min:80',
        //'latitude' => '',
        //'longitude' => '',
        'pictures' => 'required|min:2|max:6',
       // 'pictures.*' => 'array|mimes:png,jpg,jpeg',
        'website' => 'nullable|string|max:20',
        'phone' => 'nullable|string|max:15',
        'address' => 'required|string|max:60',
        'categories' => 'required|exists:categories,id|min:1',
       // 'categories.*' => 'required|exists:categories,id',
        ], ['pictures.min' => 'At least 2 pictures are required', 'pictures.max' => 'You can upload 6 pictures maximum',
        'categories.min' => 'You must choose 1 category at least']);*/

        //Get the value of requests

       // $latitude = $request->input('latitude');
       // $longitude = $request->input('longitude');
       $title = $request->input('title');
       $subtitle = $request->input('subtitle');
       $description = $request->input('description');
       $website = $request->input('website');
       $phone = $request->input('phone');
       $address = $request->input('address');

        //Save new value in the database

        $article->user_id = $user_id;
        // 'latitude' => $latitude,
        // 'longitude' => $longitude,
        $article->title = $title;
        $article->subtitle = $subtitle;
        $article->description = $description;
        $article->phone_place = $phone;
        $article->website_place = $website;
        $article->address = $address;
        $article->save();

        //To add and link categories to the article
        //$article->categories()->updateExistingPivot($article->id, $request->categories);
        $article->categories()->sync($request->categories);

        //Files pictures to add in the user's folder
        //Files pictures to add dans le dossier du user
        if($request->hasFile('pictures')) {
            $files = $request->file('pictures');
            $allowedfileExtension  =['jpg','png','jpeg'];

            foreach ($files as $file) {
               // $filename = time().'_'.$file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                 // File upload location
                if ($check) {
                    $location = 'storage/app/public/uploads/users'; // /articles/img mais à changer dans le create et vérifier s'il y a des fichiers tout court si oui, tous les supprimer et mettre les nouveaux.
                    $folder = $location .'/'. $user->id .'/articles/img/';

                    if(!file_exists($folder) && !is_dir($folder)){
                        mkdir($folder, 0777, true);
                    }
                    // clean the folder/ delete all files and replace them by the new ones
                    if (!empty($folder)) {
                        File::cleanDirectory($folder);
                    }
                    // Upload file
                    $file->move($folder,$filename);  
                    //dd($article->pictures->path);
                    //$article->pictures->path = $filename;
                    //$article->pictures->path = $folder . $filename;
                    $file->move($folder,$filename);  
                    $article->pictures()->create([
                        'path' => $folder . $filename,
                    ]);

                } 
            }
        }

        return redirect()->route('show_article', $article->id)
                ->with('success', 'your article has been successfully updated !');
    }

     /**
     * Comment a specific article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendComment(Request $request, $id)
    {
        $article = Article::find($id);
        $articleId = $article->id; //Id of the article
        $authorId = $article->user_id; //id of the author of the article
        $authorFirstname = User::find($authorId); //author of the article
        $userId = auth()->user()->id; //Id of the authenticated user
        $user = User::find($userId); //authenticated user

        ArticleComment::create([
            'comment' => $request->input('comment'),
             'user_id' => $userId, 
             'article_id' => $articleId,
        ]);

        return redirect()->route('show_article', $articleId)
        ->with('success', 'Your comment has been successfully registered !');
    }
}
