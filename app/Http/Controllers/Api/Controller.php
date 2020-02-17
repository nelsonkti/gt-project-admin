<?php


namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use Helpers;

    /**
     * 返回本应用封装的响应类实例
     */
    protected function response()
    {
        return app(Response::class);
    }

    /**
     * 获取当前已登录用户模型实例
     *
     * @return mixed
     */
    protected function user()
    {
        return Auth::user();
    }
}