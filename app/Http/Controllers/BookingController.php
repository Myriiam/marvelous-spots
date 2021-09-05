<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Book a visit with a guide.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bookVisit(Request $request, $id)
    {   
        $user_id = auth()->user()->id; //connected user (who make the booking)
       // $user = User::find($id); //user
        $user = User::find($id);
        $user_firstname = $user->firstname;
        $guide_id = $user->guide->id;
        //dd($guide_id);
        //dates when the guide is booked (the guide receive an offer)
        $booking_dates_guide = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.guide_id')
        ->select('users.firstname', 'users.id','bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.visit_date', 
        'bookings.total_price','bookings.status_demand', 'bookings.status_offer')
        ->where(['bookings.guide_id'=>$guide_id])
        ->whereIn('bookings.status_demand', ['paiement', 'booked', 'pending'])
        ->get();

        //dates when the guide has booked another guide (the guide make a demand)
        $booking_dates_user = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.user_id')
        ->select('users.firstname', 'users.id','bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.visit_date', 
        'bookings.total_price','bookings.status_demand', 'bookings.status_offer')
        ->where(['bookings.user_id'=>$user->id])
        ->whereIn('bookings.status_demand', ['paiement', 'booked', 'pending'])
        ->get();
        
        $notAvailablesDatesGuide = [];
        $notAvailablesDatesUser = [];
      
        foreach ($booking_dates_guide as $booking_date_guide) {
            array_push($notAvailablesDatesGuide, $booking_date_guide->visit_date);
        }

        foreach ($booking_dates_user as $booking_date_user) {
            array_push($notAvailablesDatesUser, $booking_date_user->visit_date);
        }
        
        $allNotAvailableDates = array_merge($notAvailablesDatesGuide, $notAvailablesDatesUser);

         // Validation 
         $request->validate([
            'visit_date' => 'required|date|not_in:' . implode(',', $allNotAvailableDates),
            'nb_person' => 'required|numeric|min:1|max:10',
            'message_booking' => 'required|string|min:20',
        ], ['visit_date.not_in' => "The guide isn't available that day, choose another date"]);

        $price_guide = User::find($id)->guide->price;
        $guide_firstname = User::find($id)->firstname;
        $visit_date = $request->input('visit_date');
        $nb_hours = $request->input('nb_hours');
        $nb_person = $request->input('nb_person');
        $message_booking = $request->input('message_booking');
        $total_price = $nb_person * $price_guide * $nb_hours;
        
            DB::table('bookings')->insert([
                'user_id' => $user_id,
                'guide_id' => $guide_id,
                'visit_date' => $visit_date, 
                'nb_hours' => $nb_hours, 
                'nb_person' => $nb_person, 
                'message' => $message_booking,
                'total_price' => $total_price,
            ]);

            return redirect()->route('profile', $id)  //Faire plus tard une redirection vers "mes réservations -> mes demandes"
            ->with('success', 'Your reservation has been registered, we are waiting for the answer from your guide : ' . $guide_firstname);
    }

    /**
     * Display a listing of the bookings of a traveler/guide(bookings) and the offer of a guide.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBookings()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id); //Auth user
        $userBookings = $user->bookings()->paginate(2, ['*'], 'bookings');
        $bookings = Booking::all();
      // dd($bookings[0]->guide->user->firstname); //nom du guide commandé
      //dd($bookings[1]->user->bookings);
    
        //dd($guide_id);
       /*  //Réservation d'un guide par un user (traveler or guide) => user_id = personne connecté (de qui ont veut récupérer ses réservation) 
         //et guide_id = personne à qui on fait la demande
          $reservationsUser = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.user_id')
          ->join('guides','guides.user_id', '=', 'bookings.user_id')
         
         
          ->select('users.firstname', 'users.id','bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.message',
           'bookings.nb_person', 'bookings.booked_at', 'bookings.visit_date', 'bookings.nb_hours', 'bookings.total_price',
           'bookings.status_demand', 'bookings.status_offer')
          ->where(['bookings.user_id'=>$user_id])
          ->get();
        dd($reservationsUser);*/

        if ($user->role === 'Guide') {
            $guide_id = $user->guide->id;
           
          //Offres reçues par un guide d'un user (traveler or guide)
          $offersGuide = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.user_id')
          ->select('users.firstname', 'users.id as userId', 'users.city', 'bookings.id', 'bookings.user_id', 'bookings.guide_id', 'bookings.message',
           'bookings.nb_person', 'bookings.booked_at', 'bookings.visit_date', 'bookings.nb_hours', 'bookings.total_price', 
           'bookings.status_demand', 'bookings.status_offer')
          ->where(['bookings.guide_id'=> $guide_id])
          ->paginate(2, ['*'], 'offers');
         // dd($offersGuide);

          return view('bookings.index',[
            'user' => $user,
            'userBookings' => $userBookings,
            'resource' => 'My bookings',
            //'reservationsUser' => $reservationsUser,
            'offersGuide' => $offersGuide,
        ]);

        } else {
            return view('bookings.index',[
                'user' => $user,
                'userBookings' => $userBookings,
                'resource' => 'My bookings',
                //'reservationsUser' => $reservationsUser,
            ]);
        }
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
}
