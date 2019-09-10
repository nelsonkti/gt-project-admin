<?php

namespace App\Admin\Controllers;

use App\Models\Admin\NewsInformation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsInformationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '新闻资讯';



    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NewsInformation);

        $grid->column('id', __('序号'));
        $grid->column('title', __('标题'));
        $grid->column('img_url', __('封面'));
        $grid->column('publish_time', __('发布时间'));
        $grid->column('publish_name', __('发布人'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('status', __('状态'))->display(function ($status) {
            return $status == 1 ? "正常" : "关闭";
        });
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('title', '标题');
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
        $show = new Show(NewsInformation::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('title', __('标题'));
        $show->field('img_url', __('封面'));
        $show->field('content', __('内容'));
        $show->field('publish_time', __('发布时间'));
        $show->field('publish_name', __('发布人'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new NewsInformation);

        $form->text('title', __('标题'))->rules('required');
        $form->chunk_file('img_url', '封面')->rules('required')->rules('required');
        $form->ckeditor('content', __('内容'))->rules('required');
        $form->datetime('publish_time', __('发布时间'))->default(date('Y-m-d H:i:s'))->rules('required');
        $form->text('publish_name', __('发布人'))->rules('required');
        $form->switch('status', __('状态'))->default(1)->rules('required');
        return $form;
    }
}
