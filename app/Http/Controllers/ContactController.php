<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $show = Show::find($id);
      //  $comments = DB::table('user_comments')->where(['show_id'=>$id])->get();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $sentMessages = DB::table('contacts')->where(['sender_id'=>$user_id])->get();
        //dd($sentMessages);
        $receivedMessages = DB::table('contacts')->where(['receiver_id'=>$user_id])->get();

        return view('contacts.index',[
            'user' => $user,
            'resource' => 'Inbox',
            'sentMessages' => $sentMessages,
            'receivedMessages' => $receivedMessages,
        ]);

    }

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
     * Undocumented function
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request, $id)
    {
        $sender_id = auth()->user()->id;
        //$sender = User::find($sender_id);

        $receiver_id = $id;
        $receiver_firstname = User::find($id)->firstname;
        //dd($receiver_firstname);
        $subject = $request->input('subject');
        $message = $request->input('message');

        DB::table('contacts')->insert([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'subject' => $subject, 
            'message' => $message
        ]);

       /* Session::flash('message', 'Your message has been sent successfully !');
        return redirect()->route('profile', $id);*/
        return redirect()->route('profile', $id)
        ->with('success', 'Your message has been sent successfully to ' .$receiver_firstname. ' !');
    }

    public function answerMessage(Request $request, $id)
    {   
        //Quand on click sur le bouton "answer", un modal s'ouvre avec du js
        //Appeler la fonction dans le bouton du form dans contactc/index.blade.php
        //Faire la fonction dans le controller en indiquant le receiver sera direct la personne qui a envoyé le message donc 
        //ce n'est pas la meme fontion que sendMessage.
        $sender_id = auth()->user()->id;
        //$sender = User::find($sender_id);

        $receiver_id = $id;
        $receiver_firstname = User::find($id)->firstname;
        //dd($receiver_firstname);
        $subject = $request->input('subject');
        $message = $request->input('message');

        DB::table('contacts')->insert([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'subject' => $subject, 
            'message' => $message
        ]);

       /* Session::flash('message', 'Your message has been sent successfully !');
        return redirect()->route('profile', $id);*/
        return redirect()->route('profile', $id)
        ->with('success', 'Your message has been sent successfully to ' .$receiver_firstname. ' !');
    }
}
