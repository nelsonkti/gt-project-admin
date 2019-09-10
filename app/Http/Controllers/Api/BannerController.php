<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\SysBanner;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request, SysBanner $banner)
    {

        return $this->response->paginator(
            $banner->index($request),
            new BaseTransformer()
        );
    }
}
