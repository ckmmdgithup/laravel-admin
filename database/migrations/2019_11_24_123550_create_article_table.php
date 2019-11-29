<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title',50)->comment('文章标题');
            $table->char('author',50)->comment('文章作者')->default('ckmmd');
            $table->string('content',5000)->comment('文章内容');
            $table->dateTime('created_at')->comment('文章创建时间');
            $table->dateTime('updated_at')->comment('文章最后更新时间');
            //$table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
