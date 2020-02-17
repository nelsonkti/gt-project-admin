<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('video')->create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->index('pid')->default(0)->comment('父节点');
            $table->string('name',64)->default('')->comment('名称');
            $table->string('desc')->default('')->comment('备注');
            $table->string('tree_level')->index('tree_level')->default('')->comment('节点层级');
            $table->integer('sort')->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table n_video.`category` comment'类别'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('video')->dropIfExists('category');
    }
}
