<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnalysisLine extends Model
{
    use SoftDeletes;

    protected $connection = 'video';

    protected $table = "analysis_lines";


    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    public $fillable = ['name', 'url', 'desc', 'sort'];

    public function index($request)
    {
        return self::query()->paginate(
            @$request->per_page ?? 100,
            ['*'],
            'page',
            @$request->page ?? 1
        );
    }
}
