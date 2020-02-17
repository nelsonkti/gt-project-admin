<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('video')->create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->comment('视频标题');
            $table->string('img_url')->default('')->comment('视频链接');
            $table->timestamp('publish_time')->nullable()->comment('发布时间');
            $table->string('author')->default('')->comment('作者');
            $table->string('desc')->default('')->comment('描述');
            $table->integer('sort')->comment('排序');
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
        Schema::connection('video')->dropIfExists('videos');
    }
}
