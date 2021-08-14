<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
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
     * Book a visit with a guide.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookVisit(Request $request, $id)
    {
         // Validation 
         $request->validate([
            'visit_start' => 'required|date|after:tomorrow',
            'visit_end' => 'required|date|after:visit_start',
            'nb_person' => 'required|numeric|min:1|max:10',
            'message_booking' => 'required|string|min:20',
        ]);

        $user_id = auth()->user()->id;
        $guide_id = $id;
        $user_firstname = User::find($user_id)->firstname;

        $visit_start = $request->input('visit_start');
        $visit_end = $request->input('visit_end');
        $nb_person = $request->input('nb_person');
        $message_booking = $request->input('message_booking');
        //$booked_at = $request->input('booked_at');
       //$total_price = $request->input('total_price'); //nb_person * price/h
      
        DB::table('bookings')->insert([
            'user_id' => $user_id,
            'guide_id' => $guide_id,
            'visit_start' => $visit_start,
            'visit_end' => $visit_end, 
            'nb_person' => $nb_person, 
            'message' => $message_booking,
        ]);

        return redirect()->route('profile', $id)  //Faire plus tard une redirection vers "mes réservations -> mes demandes"
        ->with('success', 'Your reservation has been registered, we are waiting for the answer from your guide :' .$user_firstname);
    }

    /**
     * Display a listing of the bookings of a traveler(demands)/guide(bookings) and the offer of a guide.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBookings()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
      
        $bookings = Booking::find($user);
       //dd($bookings[0]->user->guide);
        
         //Réservation d'un guide par un user (traveler or guide) => user_id = personne connecté (de qui ont veut récupérer ses réservation) 
         //et guide_id = personne à qui on fait la demande
          $reservationsUser = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.guide_id')
          ->select('users.firstname', 'users.id','bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.message',
           'bookings.nb_person', 'bookings.booked_at', 'bookings.visit_start', 'bookings.visit_end', 'bookings.total_price',
           'bookings.status_demand', 'bookings.status_offer')
          ->where(['bookings.user_id'=>$user_id])
          ->get();
        //dd($reservationsUser);

          //Offres reçues par un guide d'un user (taveler or guide)
          $offersGuide = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.user_id')
          ->select('users.firstname', 'users.id','bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.message',
           'bookings.nb_person', 'bookings.booked_at', 'bookings.visit_start', 'bookings.visit_end', 'bookings.total_price', 
           'bookings.status_demand', 'bookings.status_offer')
          ->where(['bookings.guide_id'=>$user_id])
          ->get();
          //dd($offersGuide);

        return view('bookings.index',[
            'user' => $user,
            'resource' => 'My bookings',
            'reservationsUser' => $reservationsUser,
            'offersGuide' => $offersGuide,
        ]);
    }

    /**
     * Accept an offer from another user (guide or not)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptOffer($id)
    {
        //change the status pending to paiement in the status_demand 
        //and the status null to (accepted)->waiting for paiement in the status_offer
         $booking = Booking::find($id);
        //dd($booking);
         if ($booking->status_demand === 'pending') {
            $booking->update([
                  'status_demand' => 'paiement',
                  'status_offer' => 'waiting for paiement',
              ]);
  
          return redirect()->route('my_bookings')
          ->with('success', 'Your positive reply has been sent to the recipient !');
         } 
    }

    /**
     * Decline an offer from another user (guide or not)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuseOffer($id)
    {
        //change the status pending to rejected in the status_demand
        //and the status null to refused in the status_offer
        $booking = Booking::find($id);
        //dd($booking);
         if ($booking->status_demand === 'pending') {
            $booking->update([
                  'status_demand' => 'rejected',
                  'status_offer' => 'refused',
              ]);
  
          return redirect()->route('my_bookings')
          ->with('success', 'Your negative reply has been sent to the recipient !');
         } 
    }

    /**
     * Pay the booking once user and guide are agree on the terms
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paiement(Request $request, $id)
    {
        //change the status paiement to booked in the status_demand
        //and the status waiting for paiement to booked in the status_offer

        //if the date of the end of the visit has passed, then the status for both => visit completed 
        //and redirection to the review of the guide when connecting (just 1 and only 1 review after a visit) !
    }
}
