<?php

namespace App\Admin\Controllers;

use App\Models\Admin\ListingModel;
use App\Models\Admin\SysDic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ListingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '房源管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ListingModel);

        $grid->column('id', __('序号'));
        $grid->column('title', __('房源标题'));
        $grid->column('label',__('房源推荐'))->display(function ($roles) {
            $roles = array_map(function ($role) {
                return "<span class='label label-success'>{$role['name']}</span>";
            }, $roles);
            return join('&nbsp;', $roles);
        });
        $grid->column('img_url', __('封面'));
        $grid->column('desc', __('简要描述'));
        $grid->column('content', __('详细描述'));
        $grid->column('publish_time', __('发布时间'));
        $grid->column('publish_name', __('发布人'));
        $grid->column('status', __('状态'));
        $grid->column('created_at', __('创建时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ListingModel::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('title', __('房源标题'));
        $show->field('label', __('房源推荐'));
        $show->field('img_url', __('封面'));
        $show->field('desc', __('简要描述'));
        $show->field('content', __('详细描述'));
        $show->field('publish_time', __('发布时间'));
        $show->field('publish_name', __('发布人'));
        $show->field('status', __('状态'));
        $show->field('created_at', __('创建时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ListingModel);
        $form->text('title', __('房源标题'));
        $form->multipleSelect('label',__('房源推荐'))->options(SysDic::getCodeListBuild(1002)->pluck('name', 'dic_code'));

        $form->chunk_file('img_url', '封面')->rules('required');
        $form->textarea('desc', __('简要描述'));
        $form->textarea('content', __('详细描述'));
        $form->datetime('publish_time', __('发布时间'))->default(date('Y-m-d H:i:s'));
        $form->text('publish_name', __('发布人'));
        $form->switch('status', __('状态'))->default(1);

        return $form;
    }
}
