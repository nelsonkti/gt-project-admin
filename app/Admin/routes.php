<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resources([
        '/sys/banner' => SysBannerController::class,         //广告管理
        '/news/information' => NewsInformationController::class,
        '/team' => TeamController::class,
        '/service/introductions' => ServiceIntroductionController::class,
        '/listing' => ListingController::class,
    ]);
    $router->get('common/sys/dic', 'CommonController@getSysDic');
});
