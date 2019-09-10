<?php

namespace App\Providers;

use Encore\Admin\Config\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        error_reporting(E_ALL ^ E_NOTICE);


        //SQL相关
        if (config('app.debug')) {
            //开启SQL查询日志
            DB::enableQueryLog();
            //监控SQL
            DB::listen(function ($query) {
                $sql = str_replace("?", "'%s'", $query->sql);
                $sql = vsprintf($sql, $query->bindings);
                $sql = str_replace("\\", "", $sql);
                $sql .= " " . $query->time;
                Log::info($sql);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }
    }
}
