<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('video')->create('video_to_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id')->index('video_id')->default(0)->comment('视频id');
            $table->integer('category_id')->index('category_id')->default(0)->comment('视频id');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("alter table n_video.`videos` comment'视频'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('video')->dropIfExists('video_to_category');
    }
}
