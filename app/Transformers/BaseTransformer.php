<?php
/**
 *闹铃模型转换器
 *
 * @author 谢城华 blihou@163.com
 */

namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract
{
    public function transform(Model $model)
    {
        return $model->toArray();
    }
}
