<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

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
           /* 'title' => 'required|string|min:10|max:50',
            'subtitle' => 'required|string|min:20',
            'description' => 'required|string|min:20',
            'description' => 'required|string|min:20',
            'categories[]' => '',
            'latitude' => '',
            'longitude' => '',
            'pictures[]' => '',
            'website' => '',
            'phone' => '',
            'address' => '',*/
            'categories.*' => ['required', 'integer', 'exists:categories,id'],
        ]);

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

        //Pour ajouter et lier les catégories à l'article
       /* foreach ($categories as $category) {
            $article->categories()->create([
                'name' => $request->input('categories'),
            ]);
        }*/
      //$article->categories()->sync($request->input('categories'));
        //Files pictures to add dans le dossier du user
        if($request->hasFile('pictures[]')) {
            $files = $request->file('pictures');
            foreach ($files as $file) {
                $filename = time().'_'.$file->getClientOriginalName();

                 // File upload location
                $location = 'storage/app/public/uploads/users';
                $folder = $location .'/'. $user->id .'/';

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
        $article->categories()->attach($request->categories);


         //Pour ajouter et lier les catégories à l'article
        //$article->categories()->sync($request->input('categories'));
//dd($article->categories()->sync($request->input('categories')), $article->id);
        //Il faudra après rediriger vers la page show de l'article (affichage de l'article en détails)
        return redirect()->route('welcome') 
        ->with('success', '
        Your first article has been created! 
        We will analyze it to make sure that it meets the requirements. 
        Please note that it is not yet public but will be as soon as your article has been approved! 
        This restriction will no longer apply once you have posted more than 3 approved articles! 
        ');
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
