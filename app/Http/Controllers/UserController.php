<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $user = User::find($id);
        //dd($user->id); //2
        $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');
        $userAuth= auth()->user()->id; //Id of the authenticated user 
        $guideId = $user->guide->id;
      // dd($guideId);//1
        
         //To know if the authenticated user has already or not mark the guide as favorite
         $likedGuide = DB::table('favorite_guides')->join('users', 'users.id', '=', 'favorite_guides.user_id')
         ->select('users.firstname', 'favorite_guides.id')
         ->where(['favorite_guides.guide_id'=>$guideId])
         ->where(['favorite_guides.user_id'=>$userAuth])
         ->first();
        // dd($likedGuide);

        return view('profiles.show',[
            'user' => $user,
            'resource' => 'User Profile',
            'birthdate' => $birthdate,
            'likedGuide' => $likedGuide,
            'guideId' => $guideId,
        ]);
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
       
     //  if (auth()->user()->id == $id) {
           //$user = User::find($id);
            $languages = Language::all(); 
            //dd($user);
            $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');
            //$today = Carbon::today();

            return view('profiles.edit',[
                'user' => $user,
                'resource' => 'Profile editing form',
                'languages' => $languages,
                'birthdate' => $birthdate,
            ]);
    //    }
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
       //dd($request);
         // Validation
         $request->validate([
            'picture' => 'mimes:png,jpg,jpeg|max:2048', //require lorsque l'utilisateur s'enregistre/après s'il ne veut rien uploader c ok !
            /*'country' => 'required',  
            'city' => 'required',
            'languages' => 'required',  VERIFIER VALIDATION POUR SELECT 'required|not_in:0' */
            'about' => 'required|string|min:20', //require pour un guide
            'definition' => 'string|min:20',       
            'offering' => 'string|min:20',
            'price' => 'digits_between:1,4',
            //'interests' => '', VOIR COMMENT FAIRE POUR LES SOUS-CATEGORIES (CHECKBOX, not require ?)
            //'pour chaque réseau sociaux' => '', VOIR COMMENT FAIRE POUR LES RESEAUX SOCIAUX (INPUT, not require, string, min et max)
            'pauseChoice' => 'required|in:0,1', //ou in:Yes,No ?
        ]);

        if($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time().'_'.$file->getClientOriginalName();
            //dd($filename);

            // File upload location
            $location = 'storage/app/public/uploads/users';
            $folder = $location .'/'. $user->id .'/';

            if(!file_exists($folder) && !is_dir($folder)){
                 mkdir($folder, 0777, true);
            }
            // Upload file
             $file->move($folder,$filename);  
             $user->picture = $folder . $filename; 
        }

        //$user = $user->update($request->all());
        
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->about_me = $request->input('about');
        if ($user->role === 'Guide') {
            $user->guide->languages->language = $request->input('languages');
            $user->guide->travel_definition = $request->input('definition');
            $user->guide->offering = $request->input('offering');
            /*$user->social_media = $request->input('interests');
            $user->social_media = $request->input('instagram');
            $user->social_medi = $request->input('facebook');
            $user->social_media = $request->input('pinterest');
            $user->social_media = $request->input('twitter');*/
            //and interests + comments for the guide
            $user->guide->pause = $request->input('pauseChoice');
            $user->guide->price = $request->input('price');
        }   

        $user->save();
        if ($user->role === 'Guide') {
            $user->guide->save();
        }
       // $userGuide = $user->guide->save();
        //Session::flash('message', 'Votre profil a été mis à jours !');
        return redirect()->route('profile', auth()->user()->id)
                ->with('success', 'your profile has been successfully updated !');
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
