<h1 class="font-serif">Hello {{ $article->user->firstname }} {{ $article->user->lastname }},</h1>
<h2>Congratulation, </h2>

<p>We are pleased to announce that your article <span class="italic underline">"{{ $article->title }}"</span> has been published and is now visible to everyone.<br>
You can find it in the "my articles" section of your profile.</p>

<p>Enjoy !</p><br>

<p>Kind regards,<p>
<p class="font-serif font-semibold text-first">The Marvelous Spots team</p>