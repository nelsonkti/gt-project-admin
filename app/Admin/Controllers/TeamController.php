<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TeamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '我的团队';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Team);

        $grid->column('id', __('序号'));
        $grid->column('name', __('姓名'));
        $grid->column('img_url', __('图片'));
        $grid->column('desc', __('介绍'));
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
        $show = new Show(Team::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('name', __('姓名'));
        $show->field('img_url', __('图片'));
        $show->field('desc', __('介绍'));
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
        $form = new Form(new Team);

        $form->text('name', __('姓名'));
        $form->chunk_file('img_url', '个人封面')->rules('required')->rules('required');
        $form->textarea('desc', __('介绍'));
        $form->switch('status', __('状态'))->default(1);

        return $form;
    }
}
