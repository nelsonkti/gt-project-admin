<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ListingModel extends Model
{
    protected $table = "t_listing";

    // 指定主键
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'img_url', 'desc', 'content', 'publish_time', 'publish_name', 'status', 'sort'
    ];


    public function getImgUrlAttribute($path)
    {
        return $path? config('filesystems.disks.qiniu.url') . '/' . $path : $path;
    }

    public function label()
    {
        return $this->belongsToMany(
            SysDic::class,
            't_listing_to_label',
            'listing_id',
            'label_id'
        );
    }


    /**
     * 获取房源列表
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
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

    /**
     * 通过标签获取房源列表
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListingByLabel($request)
    {
        return self::query()->from('t_listing as a')
            ->join('t_listing_to_label as b', 'a.id', '=', 'b.listing_id')
            ->select('a.*')
            ->where('b.label_id', $request->label_id)
            ->paginate(
                @$request->per_page ?? 3,
                ['*'],
                'page',
                @$request->page ?? 1
            );
    }
}
