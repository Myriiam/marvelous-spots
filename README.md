

# Marvelous Spots

Marvelous Spots is a web platform that connects people around the world who share a passion for travel.
It aims to redefine the concept of travel, promote a more ethical and social way of travelling and
to offer a unique experience to each member. To do this, the site allows
its community to benefit from the services of a guide wherever they are.
Marvelous Spots is both a blog where registered and logged-in users can publish articles but also 
a marketplace as they can also book a guide to visit specific places.

From now on, **travelers** and **guides** have the possibility to create and modify an article (publication is subject to verification), reserve a guide for a certain date, search for a guide or an article and filter them according to criteria, manage their favorites, send messages and much more. 
Of course, the **guide** is rewarded for his services.


## Technologies and requirements

The project is built with the PHP Laravel 8.x framework (Breeze for authentication).<br>
Tailwind is the CSS framework used.<br>
Payments are supported by **[Stripe](https://stripe.com/)**.<br>
Node js and PHP version 7.4 < 8. are require.<br>


## How to run the project

1. Install the project in your work environment : download or clone it from the github repository<br>
2. Launch the project from your terminal and install the following dependency managers :<br>
 <code>composer install</code><br>
 <code>npm install</code> completed by <code>npm run dev</code><br>

3. For the .env file :<br>
+ Add the Stripe keys 
+ Configure The smtp (for emails)
4. Configure your database and execute the following commands :<br>
<code>php artisan migrate</code><br>
<code>php artisan db:seed</code><br>

5. For images : <br>
<code>php artisan storage:link</code>

6. Run the project in your local server<br>
<code>php artisan serve</code>


## License

Marvelous Spots is licensed under the [MIT license](https://opensource.org/licenses/MIT). 
