<h1 class="font-serif">Hello {{ $userAuth->firstname }},</h1>
<h2>This is your confirmation email</h2>

<p>You have booked a visit for <span class="text-last font-semibold">{{ $booking->visit_date}}</span> with the guide :<span class="text-first font-semibold">{{ $booking->guide->user->firstname }}</span>.</p>
<p>You have paid {{ $booking->total_price }}€ at {{ $booking->payed_at }}</p>
<p>Details :</p>
<ul>
    <li>For {{ $booking->nb_hours}} hour(s)</li>
    <li>with {{ $booking->nb_person}} person(s)</li>
</ul>

<p>Enjoy your visit !</p><br>

<p>Kind Regards,<p>
<p class="font-serif">Marvelous Spot</p>