<?php

namespace App\Admin\Controllers;

use App\Models\Admin\SysBanner;
use App\Models\Admin\SysDic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SysBannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner 管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SysBanner);

        $grid->column('id', __('序号'));
        $grid->column('name', __('海报名称'));
        $grid->column('banner_category', __('分类'))->display(function ($dic_code) {
            return SysDic::whereDicCode($dic_code)->value('name');
        });
        $grid->column('type', __('内容类型'))->display(function ($dic_code) {
            return SysDic::whereDicCode($dic_code)->value('name');
        });
        $grid->column('img_url', '上传图片')->image(false, 100, 100);
        $grid->column('desc', __('描述'));
        $grid->column('url', __('外链地址'));
        $grid->column('status', __('状态'))->display(function ($status) {
            return $status == 1 ? "正常" : "关闭";
        });
        $grid->column('created_at', __('创建时间'));

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('name', '海报名称');
        });
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
        $show = new Show(SysBanner::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('name', __('海报名称'));
        $show->field('banner_category', __('分类'));
        $show->field('type', __('内容类型'));
        $show->field('img_url', '上传图片');
        $show->field('desc', __('描述'));
        $show->field('url', __('外链地址'));
        $show->field('status', __('状态'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SysBanner);

        $form->text('name', __('海报名称'))->rules('required|min:2|max:255');
        $form->select('banner_category', __('分类'))
            ->options(
                SysDic::getCodeListBuild(1001)->pluck('name', 'dic_code')
            )->rules('required');
        $form->select('type', __('内容类型'))
            ->options(
                SysDic::getCodeListBuild(1000)->pluck('name', 'dic_code')
            )->rules('required');
        $form->chunk_file('img_url', '上传图片')->rules('required');
        $form->text('desc', __('描述'));
        $form->url('url', __('外链地址'));
        $form->switch('status', __('状态'))->default(1)->rules('required');

        return $form;
    }
}
