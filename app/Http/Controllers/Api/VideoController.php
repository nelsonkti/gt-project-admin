<?php
/**
 * Created by PhpStorm.
 * User: 傅增耀
 * Date: 20/2/17
 * Time: 10:27
 * PHP version 7
 * @category Private
 * @package  App\Http\Controllers\Api
 * @author   fzy <571157865@qq.com>
 * @license  FZY https://571157865@qq.com
 * @link     https://571157865@qq.com
 */

namespace App\Http\Controllers\Api;

use App\Models\Video\AnalysisLine;
use App\Models\Video\Video;
use App\Models\Video\VideoSeries;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * 获取视频列表
     * @param Request $request
     * @param Video $model
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request, Video $model)
    {
        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }

    /**
     * 获取视频剧集地址
     * @param Request $request
     * @param VideoSeries $model
     * @return \Dingo\Api\Http\Response
     */
    public function getSeriesList(Request $request, VideoSeries $model)
    {
        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }

    /**
     * 获取解析地址
     * @param Request $request
     * @param AnalysisLine $model
     * @return \Dingo\Api\Http\Response
     */
    public function getAnalysisLineList(Request $request, AnalysisLine $model)
    {
        return $this->response->paginator(
            $model->index($request),
            new BaseTransformer()
        );
    }
}