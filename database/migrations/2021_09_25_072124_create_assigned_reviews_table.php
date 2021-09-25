<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->string('pay')->nullable();
            $table->string('deadline');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('assigned_reviews');
    }
}
