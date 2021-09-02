<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use App\Models\Booking;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    /**
     * Handling payment with POST - Pay the booking once user and guide are agree on the terms
     */
    public function paymentStripe(Request $request, $id)
    {   
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $userAuth_id = auth()->user()->id;
            $userAuth = User::find($userAuth_id);
            $booking = Booking::find($id);
            $senderFirstname = $userAuth->firstname;  //user firstname
            $senderEmail = $userAuth->email;  //user email
            $receiverFirstname= $booking->guide->user->firstname; //guide firstname
            $receiverEmail = $booking->guide->user->email; //guide email
            $total_price = $booking->total_price;

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source'  => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   =>  $total_price * 100,
                'currency' => 'eur'
            ));

            //change the status paiement to booked in the status_demand
            //and the status waiting for paiement to booked in the status_offer
            //Add the the date of payment
            $today = Carbon::now();

            if ($booking->status_demand === 'paiement') {
                $booking->update([
                    'status_demand' => 'booked',
                    'status_offer' => 'booked',
                    'payed_at' => $today,
                ]);
            }
            //Envoyer un email de notification aux 2 membres 
                //to the guide
            Mail::send('emails.booking-confirmation-guide', ['booking' => $booking, 'senderFirstname' => $senderFirstname],
            function($message) use ($booking, $senderFirstname) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($booking->guide->user->email, $booking->guide->user->firstname)->subject('Your booking confirmation');
            });
                //To the user
            Mail::send('emails.booking-confirmation-user', ['booking' => $booking, 'userAuth' => $userAuth],
            function($message) use ($booking, $userAuth) {
                $message->from('info@marvelous.com', 'Marvelous Info');
                $message->to($userAuth->email, $userAuth->firstname)->subject('Your booking confirmation');
            });

            return redirect()->route('my_bookings')
            ->with('success', 'your reservation has been successfully registered and a confirmation email have been send to you !');


        } catch (\Exception $ex) {
            return redirect()->route('my_bookings')
            ->with('error', 'A problem occurred during the booking process !');
        }
    }
}