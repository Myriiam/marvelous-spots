<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('guide_id')->unsigned();
            $table->date('visit_date');
            $table->integer('nb_hours');
            $table->integer('nb_person');
            $table->text('message')->encrypt(); 
            $table->timestamp('booked_at');
            $table->decimal('total_price');
            $table->enum('status_demand', ['pending', 'paiement', 'rejected', 'booked'])->default('pending');
            $table->enum('status_offer', ['refused', 'waiting for paiement', 'booked'])->nullable();
            $table->dateTime('payed_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('guide_id')->references('id')->on('guides') //user_id
            ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
