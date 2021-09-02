<h1 class="font-serif">Hello {{ $booking->guide->user->firstname }},</h1>
<h2>This is your confirmation email</h2>

<p>You have a visit on <span class="text-last font-semibold">{{ $booking->visit_date}}</span> with <span class="text-first font-semibold">{{ $senderFirstname }}</span>.</p>
<p>{{ $senderFirstname }} payed {{ $booking->total_price }}€ at {{ $booking->payed_at }}</p>
<p>Details :</p>
<ul>
    <li>For {{ $booking->nb_hours}} hour(s)</li>
    <li>with {{ $booking->nb_person}} person(s)</li>
</ul>

<p>Enjoy your visit !</p><br>

<p>Kind regards,<p>
<p class="font-serif">Marvelous Spot</p>