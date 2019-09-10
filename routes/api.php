<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\api',
    'middleware' => [
        'bindings', // 路由交给 DingoApi 来处理了，这里需要手动增加模型绑定中间件
    ]
], function ($api) {
    $api->get('/banner/list', 'BannerController@index')
        ->name('api.banner.list.get');

    $api->get('/news/list', 'NewsController@index')
        ->name('api.news.list.get');

    $api->get('/service/list', 'ServiceController@index')
        ->name('api.service.list.get');

    $api->get('/team/list', 'TeamController@index')
        ->name('api.team.list.get');

    $api->get('/listing/label/list', 'ListingController@getListingByLabel')
        ->name('api.listing.label.list.get');
});

