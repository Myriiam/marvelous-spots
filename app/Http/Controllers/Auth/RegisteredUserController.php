<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {   
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthdate' => 'required|date',
            'gender' => 'required|in:Female,Male,Other|not_in:0',
            'country' => 'required',
            'city' => 'required',
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'country' => $request->country,
            'city' => $request->city,
        ]);

        if($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();

            // File upload location
            $location = 'storage/app/public/uploads/users';
            $folder = $location .'/'. $user->id .'/avatar/';

            if(!file_exists($folder) && !is_dir($folder)){
                 mkdir($folder, 0777, true);
            }
            // Upload file
             $file->move($folder,$filename);
             $picture = $folder . $filename;
             $user->update(['picture' => $picture]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
