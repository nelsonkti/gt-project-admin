<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sys_banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('名称');
            $table->char('banner_category',32)->default('')->comment('banner 分类');
            $table->char('type',32)->default('')->index('type')->comment('类型');
            $table->string('img_url')->default('')->comment('图片链接');
            $table->string('desc')->default('')->nullable()->comment('说明');
            $table->string('url')->default('')->nullable()->comment('外链链接');
            $table->tinyInteger('status')->default(1)->comment('0:关闭；1：正常；2：删除');
            $table->timestamps();
        });
        DB::statement("alter table `t_sys_banner` comment 'banner'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sys_banner');
    }
}
