<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\ListingModel;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request, ListingModel $model)
    {

        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }

    /**
     * 通过标签获取房源列表
     * @param Request $request
     * @param ListingModel $model
     * @return \Dingo\Api\Http\Response
     */
    public function getListingByLabel(Request $request, ListingModel $model)
    {
        return $this->response->paginator(
            $model->getListingByLabel($request),
            new BaseTransformer()
        );
    }
}
