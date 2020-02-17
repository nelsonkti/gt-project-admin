<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SysBanner extends Model
{
    //
    protected $table = "t_sys_banner";

    // 指定主键
    protected $primaryKey = "id";

    protected $fillable = [
        'type', 'url', 'img_url', 'desc', 'banner_category', 'status'
    ];

    public function getImgUrlAttribute($path)
    {
        return $path ? config('filesystems.disks.qiniu.url') . '/' . $path : $path;
    }

    public function index($request)
    {
        return self::query()
            ->where('banner_category', $request->banner_category)
            ->paginate(
                @$request->per_page ?? 10,
                ['*'],
                'page',
                @$request->page ?? 1
            );
    }
}
