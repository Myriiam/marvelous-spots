<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Booking;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Handling payment with POST - Pay the booking once user and guide are agree on the terms
     */
    public function paymentStripe(Request $request, $id)
    {   
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $booking = Booking::find($id);
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
                //TODO

            return redirect()->route('my_bookings')
            ->with('success', 'your reservation has been successfully registered !');

        } catch (\Exception $ex) {
            return redirect()->route('my_bookings')
            ->with('error', 'A problem occurred during the booking process !');
        }
    }
}