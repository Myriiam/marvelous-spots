<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class GuideController extends Controller
{
    /**
     * Display all the users who have submitted the form to become a guide.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRequests()
    {
        $newGuides = DB::table('users as u')
                ->select('gu.id', 'gu.user_id', 'gu.status', 'gu.created_at', 'u.firstname', 'u.lastname', 'u.city')
                ->join('guides as gu', 'gu.user_id', '=', 'u.id')
                ->where ('gu.status', '=', 'pending')
                ->get();
       
        return view('admin.guides.guide-application',[
            'resource' => 'Users Requests',
            'newGuides' => $newGuides,
        ]);
    }

    /**
     * Accept the request of a user who want to be a guide.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function acceptRequest($id)
    {
        $guide = Guide::find($id);
    
         if ($guide->status === 'pending') {
             //Ajouter la date since_when + changer status pending => accepted
            $guide->update([
                  'status' => 'accepted',
                  'since_when' => Carbon::now(),
              ]);
              //changer le role traveler => guide (dans la table user)
            $guide->user->update([
                'role' => 'Guide',
            ]);
        
            //Send an acceptance email to the user
            Mail::send('admin.guides.email-acceptance', ['guide' => $guide],
            function($message) use ($guide) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($guide->user->email, $guide->user->firstname)->subject('Your application to become a guide');
            });

            return redirect()->route('guide_application')
            ->with('success', 'Your have approved the new guide and an email has been sent to him/her !');
        }
    }

     /**
      * Reject the request of a user who want to be a guide.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
    public function refuseRequest($id)
    {
        $guide = Guide::find($id);
        //changer status pending => refused
        if ($guide->status === 'pending') {
            //Ajouter la date since_when + changer status pending => accepted
           $guide->update([
                 'status' => 'refused',  //Ajouter 1 champs pour savoir qd l'admin a refuser la requête ?
                 'since_when' => Carbon::now(), //date à laquelle l'admin à refuser la demande
             ]);

            //Supprimer les categories et langues de l'user (qu'il a ajouté lors de son inscription)
             $guide->languages()->detach();
             $guide->categories()->detach();

            //Send a rejection email to the user
            Mail::send('admin.guides.email-rejection', ['guide' => $guide],
            function($message) use ($guide) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($guide->user->email, $guide->user->firstname)->subject('Your application to become a guide');
            });

            return redirect()->route('guide_application')
            ->with('success', 'Your have refused the new guide and an email has been sent to him/her !');
        }
    }

    /**
     * Display the details of the request (motivation etc...).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRequest($id)
    {
        //Montrer les détails de la requête (du formulaire complété par le user)
        $guide = Guide::find($id);
        $categories = $guide->categories;
        $languages = $guide->languages;

        $publishedArticles = DB::table('articles as art')
        ->join('users as u', 'u.id', '=', 'art.user_id')
        ->where('art.user_id', '=', $guide->user_id)
        ->where('art.status', '=', 'published')
        ->count();

        $reviewArticles = DB::table('articles as art')
        ->join('users as u', 'u.id', '=', 'art.user_id')
        ->where('art.user_id', '=', $guide->user_id)
        ->where('art.status', '=', 'under_review')
        ->count();
        
        return view('admin.guides.show',[
            'resource' => 'Details Requests',
            'guide' => $guide,
            'categories' => $categories,
            'languages' => $languages,
            'publishedArticles' => $publishedArticles,
            'reviewArticles' => $reviewArticles,
        ]);
    }

}
