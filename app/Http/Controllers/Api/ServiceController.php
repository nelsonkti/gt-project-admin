<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\NewsInformation;
use App\Models\Admin\ServiceIntroduction;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request, ServiceIntroduction $model)
    {

        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }
}
