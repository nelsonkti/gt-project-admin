<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $table = "t_team";

    // 指定主键
    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'img_url', 'desc', 'status'
    ];

    public function getImgUrlAttribute($path)
    {
        return $path? config('filesystems.disks.qiniu.url') . '/' . $path : $path;
    }

    public function index($request)
    {
        return self::query()
            ->paginate(
                @$request->per_page ?? 4,
                ['*'],
                'page',
                @$request->page ?? 1
            );
    }
}
