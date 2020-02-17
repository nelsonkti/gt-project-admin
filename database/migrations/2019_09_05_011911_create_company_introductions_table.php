<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyIntroductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_introduction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',125)->default('')->index('title')->comment('姓名');
            $table->text('content')->default('')->comment('内容');
            $table->string('img_url')->default('')->comment('图片');
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
        Schema::dropIfExists('company_introduction');
    }
}
