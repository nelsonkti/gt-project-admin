<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoToCategory extends Model
{
    use SoftDeletes;

    protected $connection = 'video';

    protected $table = "video_to_category";


    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    public $fillable = ['video_id', 'category_id'];
}
