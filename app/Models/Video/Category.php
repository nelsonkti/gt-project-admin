<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    protected $connection = 'video';

    protected $table = "category";


    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    public $fillable = ['pid', 'name', 'desc', 'tree_level','sort'];

}
