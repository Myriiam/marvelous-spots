<h1 class="font-serif">Hello {{ $booking->user->firstname }},</h1>
<h2>This email to let you know that {{ $booking->guide->user->firstname }} has accepted your offer for a visit in {{ $booking->guide->user->city }}</h2>

<p>Details :</p>
<ul>
    <li>On {{ $booking->visit_date}} hour(s)</li>
    <li>For {{ $booking->nb_hours}} hour(s)</li>
    <li>with {{ $booking->nb_person}} person(s)</li>
</ul>

<p>One more step and the booking will be finalized !</p><br>


<p>Kind Regards,<p>
<p class="font-serif">Marvelous Spot</p>