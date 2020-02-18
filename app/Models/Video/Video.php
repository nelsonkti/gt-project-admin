<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Video extends Model
{
    use SoftDeletes;

    protected $connection = 'video';

    protected $table = "videos";

    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    public $fillable = ['title', 'img_url', 'publish_time', 'author', 'desc', 'sort'];

    public function index($request)
    {
        return self::query()->paginate(
            @$request->per_page ?? 100,
            ['*'],
            'page',
            @$request->page ?? 1
        );
    }

    public function info($request)
    {
        return self::query()->where('id', $request->id)->first();
    }
}
