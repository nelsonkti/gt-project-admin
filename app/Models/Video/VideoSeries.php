<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoSeries extends Model
{
    use SoftDeletes;

    protected $connection = 'video';

    protected $table = "video_series";


    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    public $fillable = ['video_id', 'series_id', 'url'];


    public function index($request)
    {
        return self::query()
            ->where('video_id', $request->video_id)
            ->paginate(
                @$request->per_page ?? 100,
                ['*'],
                'page',
                @$request->page ?? 1
            );
    }
}
