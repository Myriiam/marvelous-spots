<h1>Hello {{ $booking->guide->user->firstname }},
<p>This is your confirmation email</h1>

<p>You have a visit on {{ $booking->visit_date}} with /nom/</p>
<p>The user /nom/ payed {{ $booking->total_price }} at {{ $booking->payed_at }}</p>
<p>Details :</p>
<ul>
    <li>For {{ $booking->nb_hours}} hour(s)</li>
    <li>with {{ $booking->nb_person}} person(s)</li>
</ul>

<p>Kind regards,<p>
<p>Marvelous Spot</p>