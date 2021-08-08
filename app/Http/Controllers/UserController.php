<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
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
        //dd($user);
        //dd($user->birthdate);
        $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');
        //dd($birthdate);
        return view('profile.show',[
            'user' => $user,
            'resource' => 'User Profile',
            'birthdate' => $birthdate,
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
        //dd(auth()->user()->id);
        //dd($id);
     //  if (auth()->user()->id == $id) {
           //$user = User::find($id);
            $languages = Language::all(); 
            //dd($user);
            $birthdate = Carbon::parse($user->birthdate)->format('d/m/Y');
            //$today = Carbon::today();

            return view('profile.edit',[
                'user' => $user,
                'resource' => 'Profile editing form',
                'languages' => $languages,
                'birthdate' => $birthdate,
            ]);
    //    }

     //   $users = User::all();
      //  return redirect()->route('welcome', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        //$user = auth()->user();
        $user = User::findOrFail(auth()->id());
        //dd($user);
        // Validation
      /* $request->validate([
                                    => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);*/

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
        }

        //$user = $user->update($request->all());
        $user->picture = $folder . $filename;
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->about_me = $request->input('about');
        $user = $user->save();
        //Session::flash('message', 'Votre profil a été mis à jours !');
        return redirect()->route('profile', auth()->user()->id);

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
