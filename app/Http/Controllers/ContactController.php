<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class ContactController extends Controller
{
    /**
     * Display all the messages received and send by a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllMessages()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        //$contacts = Contact::find($user);
       
        //All sent messages by the owner of the inbox
        //$sentMessages = DB::table('contacts')->where(['sender_id'=>$user_id])->get();
        
        //All messages received by the owner of the inbox
        //$receivedMessages = DB::table('contacts')->where(['receiver_id'=>$user_id])->get();

          // Messages reçus : Name of the sender (received Messages by $user_id - to know the name of the sender)
          $receivedMessages = DB::table('contacts')->join('users', 'users.id', '=', 'contacts.sender_id')
          ->select('users.firstname', 'users.id','contacts.id', 'contacts.receiver_id', 'contacts.sender_id', 'contacts.subject', 'contacts.message', 'contacts.status', 'contacts.date')
          ->where(['contacts.receiver_id'=>$user_id])
          ->get();
      
          // Messages envoyés : Name of the receiver (sent Messages by $user_id - to know the name of the receiver)
          $sentMessages = DB::table('contacts')->join('users', 'users.id', '=', 'contacts.receiver_id')
          ->select('users.firstname', 'users.id', 'contacts.id','contacts.receiver_id', 'contacts.sender_id', 'contacts.subject', 'contacts.message', 'contacts.status', 'contacts.date')
          ->where(['contacts.sender_id'=>$user_id])
          ->get();
          

        return view('contacts.index',[
            'user' => $user,
            'resource' => 'Inbox',
            'sentMessages' => $sentMessages,
            'receivedMessages' => $receivedMessages,
        ]);
    }

    /**
     * Function to send a message to a guide
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request, $id)
    {
        // Validation 
        $request->validate([
            'subject' => 'required|string|max:50',
            'message' => 'required|string',
        ]);

        $sender_id = auth()->user()->id;
        $receiver_id = $id;
        $receiver_firstname = User::find($id)->firstname;
        $subject = $request->input('subject');
        $message = $request->input('message');

        DB::table('contacts')->insert([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'subject' => $subject, 
            'message' => $message,
        ]);

        return redirect()->route('profile', $id)
        ->with('success', 'Your message has been sent successfully to ' .$receiver_firstname. ' !');
    }

    /**
     * Change the status of the message to read (unread to read)
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatusMessage($id)
    {
       //$user_id = auth()->user()->id;
        $contact = Contact::find($id);

       if ($contact->status === 'unread') {
            $contact->update([
                'status' => 'read',
            ]);

        return redirect()->route('my_inbox')
        ->with('success', 'Your message has been mark as read !');

       } else {
            $contact->update([
                'status' => 'unread',
            ]);

            return redirect()->route('my_inbox')
        ->with('success', 'Your message has been mark as unread !');
       }
    }

    /**
     * Answer to a message
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function answerMessage(Request $request, $id)
    {   
        //Quand on click sur le bouton "answer", un modal s'ouvre avec du js
        //Appeler la fonction dans le bouton du form dans contactc/index.blade.php
        //Faire la fonction dans le controller en indiquant le receiver sera direct la personne qui a envoyé le message donc 
        //ce n'est pas la meme fonction que sendMessage.
        $request->validate([
            'subject' => 'required|string|max:50',
            'message' => 'required|string',
        ]);
      
        $sender_id = auth()->user()->id;
        $receiver_id = $id;
        $receiver_firstname = User::find($id)->firstname;
 
        $subject = $request->input('subject');
        $message = $request->input('message');

        DB::table('contacts')->insert([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'subject' => $subject, 
            'message' => $message
        ]);

        return redirect()->route('my_inbox', $sender_id)
        ->with('success', 'Your message has been sent successfully to ' .$receiver_firstname. ' !');
    }

     /**
     * Delete the specified message (sent or received).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMessage($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('my_inbox')
            ->with('success','The message has been successfully deleted !');
    }
}
