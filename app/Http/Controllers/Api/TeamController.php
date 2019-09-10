<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\NewsInformation;
use App\Models\Admin\ServiceIntroduction;
use App\Models\Admin\Team;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request, Team $model)
    {

        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }
}
