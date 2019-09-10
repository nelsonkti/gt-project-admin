<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Dingo\Api\Routing\Helpers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

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
