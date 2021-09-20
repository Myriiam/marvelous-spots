<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('user_id')->unsigned();
            $table->text('motivation');
            $table->text('travel_definition')->nullable(); //mettre à nullable
            $table->text('offering');
            $table->enum('status', ['pending', 'accepted', 'refused'])->default('pending'); //default à pending
            $table->decimal('price')->nullable();
            $table->boolean('pause')->default(0);  //c'était false avant
            $table->timestamp('created_at');
            $table->dateTime('since_when')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('guides');
    }
}
