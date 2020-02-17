<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysDisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sys_dic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code',4)->default('')->index('code')->comment('类型');
            $table->char('dic_code',10)->default('')->index('dic_code')->comment('主键');
            $table->string('name',50)->default('')->comment('名称');
            $table->tinyInteger('status')->default(1)->comment('0:关闭；1：正常；2：删除');
            $table->tinyInteger('sort')->default(1)->comment('排序');
            $table->timestamps();
        });
        DB::statement("alter table `t_sys_dic` comment '字典表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sys_dic');
    }
}
