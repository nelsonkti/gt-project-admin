<?php

namespace App\Admin\Controllers;

use App\Models\Admin\ServiceIntroduction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceIntroductionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '服务介绍';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ServiceIntroduction);

        $grid->column('id', __('序号'));
        $grid->column('title', __('标题'));
        $grid->column('desc', __('描述'));
        $grid->column('img_url', __('图片'));
        $grid->column('content', __('内容'));
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
        $show = new Show(ServiceIntroduction::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('title', __('标题'));
        $show->field('desc', __('描述'));
        $show->field('img_url', __('图片'));
        $show->field('content', __('内容'));
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
        $form = new Form(new ServiceIntroduction);

        $form->text('title', __('标题'));
        $form->text('desc', __('描述'));
        $form->chunk_file('img_url', '封面')->rules('required')->rules('required');
        $form->textarea('content', __('内容'));
        $form->switch('status', __('状态'))->default(1);

        return $form;
    }
}
