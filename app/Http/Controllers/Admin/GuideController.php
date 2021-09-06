<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllRequests()
    {
        //$guidesInBecoming = Guide::all();

        return view('admin.guide-application',[
       
            'resource' => 'Users Requests',
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptRequest()
    {
        //changer status pending => accepted
        //Ajouter la date since_when
        //changer le role traveler => guide (dans la table user)
        //Send an acceptance email to the user
    }

    /**
     * Reject the request of a user who want to be a guide.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refuseRequest(Request $request)
    {
        //changer status pending => refused
        //Supprimer les categories et langues de l'user (qu'il a ajouté lors de son inscription)
        //Send a rejection email to the user
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
        //Ajouter les bouton accepter et refuser sur cette page
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
