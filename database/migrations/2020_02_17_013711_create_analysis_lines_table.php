<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('video')->create('analysis_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('线路名称');
            $table->string('url')->comment('路由');
            $table->string('desc')->comment('备注');
            $table->integer('sort')->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table n_video.`analysis_lines` comment'视频线路'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('video')->dropIfExists('analysis_lines');
    }
}
