<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableCategoryGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_guide', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->foreignId('category_id')->unsigned();
            $table->foreignId('guide_id')->unsigned();
            
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('guide_id')->references('id')->on('guides')
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
        Schema::dropIfExists('category_guide');
    }
}
