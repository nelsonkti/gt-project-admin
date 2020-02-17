<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',125)->default('')->index('name')->comment('姓名');
            $table->string('img_url')->default('')->comment('图片');
            $table->string('desc')->default('')->comment('描述');
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
        Schema::dropIfExists('t_team');
    }
}
