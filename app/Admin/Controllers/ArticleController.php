<?php

namespace App\Admin\Controllers;


use App\Model\Article as ArtcileModel;
use Encore\Admin\Form;
use Encore\Admin\Layout\Row;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;

class ArticleController extends AuthController
{
    //文章表格对象
    protected function grid()
    {
        return Admin::grid(ArtcileModel::class, function (Grid $grid) {

            $grid->column('id', 'ID')->sortable();
            $grid->column('title','文章标题');
            $grid->column('author','文章作者');
            $grid->column('keywords','SEO——keywords');
            $grid->column('description','文章简述');
            $grid->column('created_at','生成时间');
            $grid->column('updated_at','最后修改时间');
            $grid->perPages([10, 50, 100, 500]);
        });
    }
    protected function from()
    {
        return Admin::form(ArtcileModel::class, function (Form $form) {
            $form->text('title', '文章标题')
                 ->rules('required');
            $directors = [
                1 => 'ckmmd',
            ];
            $form->select('author', '作者')->options($directors);
            $form->text('keywords', 'SEO——keywords');
            $form->text('description', '文章简述');


            $form->quill('content', '文章内容')->rules('required');

            //工具按钮
            $form->tools(function (Form\Tools $tools) {
                // 去掉`列表`按钮
                //$tools->disableList();
                // 去掉`删除`按钮
                //$tools->disableDelete();
                // 去掉`查看`按钮
                //$tools->disableView();
            });
            //表单脚步按钮
            $form->footer(function ($footer) {
                // 去掉`查看`checkbox
                $footer->disableViewCheck();

                // 去掉`继续编辑`checkbox
                $footer->disableEditingCheck();

                // 去掉`继续创建`checkbox
                $footer->disableCreatingCheck();

            });
        });
    }


    public function index(Content $content)
    {

        // 头
        $content->header('文章管理');
        // 小标题
        $content->description('文章状态...');

        // 添加面包屑导航
        $content->breadcrumb(
            ['text' => '首页', 'url' => '/admin'],
            ['text' => '用户管理', 'url' => '/admin/users'],
            ['text' => '编辑用户']
        );
        // 用表格对象grid填充文章列表页面
        $content->body($this->grid());
        return $content;
    }
    public function create(Content $content)
    {
        $content->header('文章管理');
        // 小标题
        $content->description('文章添加...');

        // 添加面包屑导航
        $content->breadcrumb(
            ['text' => '首页', 'url' => '/admin'],
            ['text' => '用户管理', 'url' => '/admin/users'],
            ['text' => '编辑用户']
        );
        // 用表格对象grid填充文章列表页面
        $content->body($this->from());
        return $content;
    }
    public function store(){

        return 'laile';

    }
    public function edit($id)
    {
        dump($id);
    }



}
