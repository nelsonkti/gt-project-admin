<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\NewsInformation;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, NewsInformation $model)
    {

        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }
}
