<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableGuideLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_language', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('guide_id')->unsigned();
            $table->foreignId('language_id')->unsigned();
            
            $table->foreign('guide_id')->references('id')->on('guides')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')
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
        Schema::dropIfExists('guide_language');
    }
}
