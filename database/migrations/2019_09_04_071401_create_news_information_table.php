<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index('title')->default('')->comment('标题');
            $table->string('img_url')->index('img_url')->default('')->comment('封面');
            $table->text('content')->default('')->comment('内容');
            $table->timestamp('publish_time')->index('publish_time')->default(0)->comment('发布时间');
            $table->string('publish_name')->index('publish_name')->default('')->comment('发布人');
            $table->tinyInteger('status')->default(1)->comment('0:关闭；1：正常；2：删除');
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
        Schema::dropIfExists('news_information');
    }
}
