<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingToLabelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_listing_to_label', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('listing_id')->default(0)->index('listing_id')->comment('房源id');
            $table->integer('label_id')->default(0)->index('label_id')->comment('标签id');
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
        Schema::dropIfExists('t_listing_to_label');
    }
}
