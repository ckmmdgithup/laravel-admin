<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     * 文章表添加字段
     */
    public function up()
    {
        //
        Schema::table('article',function (Blueprint $table){

            $table->char('keywords',200)->comment('keywords用于SEO');
            $table->string('description')->comment('description用于SEO');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     * 文章表添加字段错误回滚
     *
     */
    public function down()
    {
        //
        Schema::table('article', function (Blueprint $table) {
            $table->dropColumn('keywords');
            $table->dropColumn('description');
        });
    }
}
