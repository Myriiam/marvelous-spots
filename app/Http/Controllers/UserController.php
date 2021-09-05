<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\File\File;

class UserController extends Controller
{
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
     * Display a specified resource (the profile of all user).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        $user = User::find($id); //dd($user->id); //2
        $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');

        if ($user->role === 'Guide' && !is_null(auth()->user())) {
            $userAuth = auth()->user()->id; //Id of the authenticated user 
            $guideId = $user->guide->id; // dd($guideId);//1
            $categories = $user->guide->categories;
            $languages = $user->guide->languages;
            
            //To know if the authenticated user has already or not mark the guide as favorite
            $likedGuide = DB::table('favorite_guides')->join('users', 'users.id', '=', 'favorite_guides.user_id')
            ->select('users.firstname', 'favorite_guides.id')
            ->where(['favorite_guides.guide_id'=>$guideId])
            ->where(['favorite_guides.user_id'=>$userAuth])
            ->first();
            
            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                'likedGuide' => $likedGuide,
                'guideId' => $guideId,
                'categories' => $categories,
                'languages' => $languages,
            ]);
        } else if ($user->role === 'Guide' && is_null(auth()->user())) {
            $categories = $user->guide->categories;
            $languages = $user->guide->languages;

            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                'languages' => $languages,
                'categories' => $categories,
            ]);
        } else {
            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                
            ]);
        }
    }

    /**
     * Display a specified resource (the profile of all user).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $users = User::all();
        
        return view('welcome',[
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the profile of the user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $languages = Language::all();
        $categories = Category::all();
        $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');
        //$today = Carbon::today();
        if ($user->role === 'Guide') {
            $selectedCat = [];
            $selectedLang = [];
            foreach ($user->guide->categories as $categoriesOfGuide) {
                array_push($selectedCat, $categoriesOfGuide->id);
            }

            foreach ($user->guide->languages as $langOfGuide) {
                array_push($selectedLang, $langOfGuide->id);
            }

            return view('profiles.edit',[
                'user' => $user,
                'resource' => 'Profile editing form',
                'languages' => $languages,
                'birthdate' => $birthdate,
                'categories' => $categories,
                'selectedCat' => $selectedCat,
                'selectedLang' => $selectedLang,
            ]);
        } else {
            return view('profiles.edit',[
                'user' => $user,
                'resource' => 'Profile editing form',
                'languages' => $languages,
                'birthdate' => $birthdate,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        //$user = User::findOrFail(auth()->id());
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        if ($user->role !== 'Guide') {
            $request->validate([
                'picture' => 'mimes:png,jpg,jpeg|max:2048', 
                /*'country' => 'required',  
                'city' => 'required',*/
                'about' => 'string|min:20',
            ]);    
        } else {
            // Validation
         $request->validate([
            'picture' => 'mimes:png,jpg,jpeg|max:2048', //require lorsque l'utilisateur s'enregistre/après s'il ne veut rien uploader c ok !
            /*'country' => 'required',  
            'city' => 'required',*/
            'languages' => 'required|exists:languages,id|min:1',
            'about' => 'required|string|min:20', //require pour un guide
             'definition' => 'string|min:20',       
            'offering' => 'required|string|min:20',
            'price' => 'numeric|min:1|max:99.99|regex:/^\d+(\.\d{1,2})?$/',
            'categories' => 'required|exists:categories,id|min:1',
           // 'pour chaque réseau sociaux' => '',
            'pauseChoice' => 'required|in:0,1',
        ]);
        }

        if ($request->hasFile('picture')) {

            $userPicture = public_path($user->picture); // get previous image from folder

            if (File::exists($userPicture)) { // unlink or remove previous image from folder
                unlink($userPicture);
            }
            
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = 'storage/app/public/uploads/users';
            $folder = $location .'/'. $user->id .'/avatar/';

            if (!file_exists($folder) && !is_dir($folder)){
                 mkdir($folder, 0777, true);
            }
            // Upload file
             $file->move($folder,$filename);  
             $user->picture = $folder . $filename; 
        }
        
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->about_me = $request->input('about');
        $user->save();

        if ($user->role === 'Guide') {
            $user->guide->travel_definition = $request->input('definition');
            $user->guide->offering = $request->input('offering');
        /*  $user->social_media = $request->input('instagram');
            $user->social_medi = $request->input('facebook');
            $user->social_media = $request->input('pinterest');
            $user->social_media = $request->input('twitter'); */
            $user->guide->pause = $request->input('pauseChoice');
            $user->guide->price = $request->input('price');
            $user->guide->categories()->sync($request->categories);   //To add and link categories to the guide
            $user->guide->languages()->sync($request->languages);   //To add and link languages to the guide

            $user->guide->save();
        }   
       
        return redirect()->route('profile', auth()->user()->id)
                ->with('success', 'your profile has been successfully updated !');
    }

    /**
     * Fill the form to become a guide 
     *
     * @param int $id
     * @return void
     */
    public function makeDemandtoBecomeGuide($id) {
       // $user_id = auth()->user()->id;
        $user = User::find($id);
        $categories = Category::all();
        $languages = Language::all();

        return view('guides.becoming-guide-form',[
            'user' => $user,
            'resource' => 'So you would like to become a guide ...',
            'categories' => $categories,
            'languages' => $languages,
        ]);
    }
    /**
     * Send the form (your request) to become a guide 
     *
     * @param int $id
     * @return void
     */
    public function sendDemandtoBecomeGuide(Request $request) {
       
        $request->validate([
            //'lang' => 'required',
            'categories' => 'required|exists:categories,id|min:1',
            'languages' => 'required|exists:languages,id|min:1',
            'offers' => 'required|string|min:20',
            'motivation' => 'required|string|min:50',
        ], ['categories.min' => 'You must choose 1 category at least']);
       
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $categories = Category::all();
        $languages = Language::all();

        $guide = new Guide();
        $languages = $request->languages;
        $offering = $request->offers;
        $motivation = $request->motivation;
        $categories = $request->categories;

        //Enregistrer les datas dans la BDD
        $guide->user_id = $user->id;
        $guide->offering = $offering;
        $guide->motivation = $motivation;
        $guide->save();

        //Pour ajouter et lier les catégories au guide
        $guide->categories()->attach($categories);

        //Pour ajouter et lier les langues au guide
        $guide->languages()->attach($languages);

        return redirect()->route('profile', $user_id) 
                ->with('success', 'Your demand has been send successfully to the administrator.');
    }

    /**
     * Remove the user permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
