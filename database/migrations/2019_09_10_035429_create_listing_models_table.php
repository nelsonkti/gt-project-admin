<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_listing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('type',32)->default(0)->index('type')->comment('类型');
            $table->string('title')->default('')->index('title')->comment('姓名');
            $table->text('desc')->default('')->comment('描述');
            $table->text('content')->default('')->comment('内容');
            $table->string('img_url')->index('img_url')->default('')->comment('封面');
            $table->timestamp('publish_time')->index('publish_time')->default(0)->comment('发布时间');
            $table->string('publish_name')->index('publish_name')->default('')->comment('发布人');
            $table->integer('sort')->default(1)->comment('排序');
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
        Schema::dropIfExists('t_listing');
    }
}
