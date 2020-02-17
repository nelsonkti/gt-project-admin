<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SysDic extends Model
{
    //
    protected $table = "t_sys_dic";

    // 指定主键
    protected $primaryKey = "dic_code";

    protected $fillable = [
        'code', 'dic_code', 'name', 'sort', 'status'
    ];

    public static function getCodeListBuild($code = null, $type = null)
    {
        return self::query()
            ->when($code, function ($query) use ($code) {
                $query->where('code', $code)->where('dic_code','!=',0);
            })->get();
    }
}


