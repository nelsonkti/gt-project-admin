<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('video')->create('video_series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id')->index('video_id')->default(0)->comment('视频id');
            $table->integer('series_id')->default(1)->comment('视频剧集');
            $table->string('url')->default('')->comment('链接');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table n_video.`video_series` comment'剧集'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('video')->dropIfExists('video_series');
    }
}
