<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('role', ['Administrator', 'Moderator', 'Traveler', 'Guide'])->default('Traveler');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['Female', 'Male', 'Other']);
            $table->string('country', 70);  //->nullable();
            $table->string('city', 255);  //->nullable();
            $table->string('picture', 100); //->default('uploads/profile/avatar.png');
            $table->text('about_me')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
