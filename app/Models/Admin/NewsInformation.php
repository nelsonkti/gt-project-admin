<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NewsInformation extends Model
{
    protected $table = "news_information";

    // 指定主键
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'img_url', 'content', 'publish_time', 'publish_name', 'status'
    ];

    public function getImgUrlAttribute($path)
    {
        return $path? config('filesystems.disks.qiniu.url') . '/' . $path : $path;
    }

    public function index($request)
    {
        return self::query()
            ->paginate(
                @$request->per_page ?? 10,
                ['*'],
                'page',
                @$request->page ?? 1
            );
    }
}
