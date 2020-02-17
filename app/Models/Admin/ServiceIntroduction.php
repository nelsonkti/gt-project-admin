<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ServiceIntroduction extends Model
{
    protected $table = "service_introductions";

    // 指定主键
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'desc','img_url', 'content', 'status'
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
