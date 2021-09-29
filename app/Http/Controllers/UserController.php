<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Language;
use App\Models\CommentGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\File\File;

class UserController extends Controller
{
    
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
        $today = Carbon::now();
        $booking = null;

        if ($user->role !== 'Administrator' && $user->role === 'Guide') {
            $allGuideComments = DB::table('bookings')
            ->select('users.firstname', 'users.picture', 'bookings.id', 'bookings.user_id as user_id', 'bookings.guide_id as guide_id', 'cmg.created_at', 'cmg.comment')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('guides', 'guides.user_id', '=', 'users.id')
            ->join('comment_guides as cmg', 'cmg.booking_id', '=', 'bookings.id')
            ->where('bookings.guide_id', "=", $user->guide->id)
            ->get();
            //dd($allGuideComments);
        }


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

             //to know if the user has had a visit with the profile guide
            $userBookings = DB::table('bookings')
            ->select('users.firstname', 'bookings.id', 'bookings.user_id as user_id', 'bookings.guide_id as guide_id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('guides', 'guides.user_id', '=', 'users.id')
        // ->join('comment_guides as cmg', 'cmg.booking_id', '=', 'bookings.id')
            ->where('bookings.visit_date', "<", Carbon::parse($today)->format('Y/m/d'))
            ->where('bookings.user_id', "=", auth()->user()->id)
            ->where('bookings.guide_id', "=", $user->guide->id)
            ->orderBy('bookings.visit_date', 'desc')
            ->get()->toArray();

            //dd($userBookings);
            $idBooking = []; //id de la visite
            $idGuideBooking = []; //id du guide de la visite
            $idUserBooking = [];  //id du user qui a réservé la visite
            // $comment = [];

            foreach ($userBookings as $booking) {
                array_push($idBooking, $booking->id);
                array_push($idGuideBooking, $booking->guide_id);
                array_push($idUserBooking, $booking->user_id);
                // array_push($comment, $booking->comment);
                //dd($booking->comment);
            }

            if (!empty($idBooking)) {
                $booking = Booking::find($idBooking[0]);
               // dd($booking->comment);
            }

            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                'likedGuide' => $likedGuide,
                'guideId' => $guideId,
                'categories' => $categories,
                'languages' => $languages,
                'today' => $today,
                'idBooking' => $idBooking,
                'idGuideBooking' => $idGuideBooking,
                'idUserBooking' => $idUserBooking,
                'booking' => $booking,
                'allGuideComments' => $allGuideComments,
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
                'today' => $today,
                'allGuideComments' => $allGuideComments,

            ]);
        } else if ($user->role === 'Administrator') {
            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                'today' => $today,
            ]);
        } else {
            return view('profiles.show',[
                'user' => $user,
                'resource' => 'User Profile',
                'birthdate' => $birthdate,
                'today' => $today,
               // 'allGuideComments' => $allGuideComments,
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
     * @param int $id id du user connecté qui a fait la demande
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
     * Comment a specific guide after a visit with him.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendComment(Request $request, $id)
    {
        $booking = Booking::find($id);
        $bookingId = $booking->id; //Id of the visit
        $guide = $booking->guide->user->id;
       //dd($guide);
        $authorId = $booking->user_id; //id of the user who booked the visit
        $authorFirstname = User::find($authorId); //the user who booked the visit
        $userId = auth()->user()->id; //Id of the authenticated user
        $user = User::find($userId); //authenticated user

        CommentGuide::create([
            'booking_id' => $bookingId,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('profile', $guide)
        ->with('success', 'Your comment has been successfully registered !');
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
