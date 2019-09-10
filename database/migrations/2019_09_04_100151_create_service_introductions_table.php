<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceIntroductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_introductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index('title')->default('')->comment('标题');
            $table->string('desc')->default('')->comment('标题');
            $table->string('img_url')->index('img_url')->default('')->comment('封面');
            $table->text('content')->default('')->comment('内容');
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
        Schema::dropIfExists('service_introductions');
    }
}
