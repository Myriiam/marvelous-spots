<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('user_id')->unsigned();
            $table->string('title', 60);
            $table->string('subtitle', 60);
            $table->text('description');
            $table->string('phone_place', 15)->nullable();
            $table->string('website_place', 20)->unique()->nullable();
            $table->string('address', 60);
            $table->enum('status', ['under_review', 'published', 'unpublished'])->default('under_review');
            $table->timestamps();

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
        Schema::dropIfExists('articles');
    }
}
