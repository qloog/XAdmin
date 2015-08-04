<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('news');
        Schema::create('news', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->comment = '新闻标题';
                $table->string('meta_keyword')->default('')->comment = '页面关键词';
                $table->string('meta_description')->default('')->comment = '页面描述';
                $table->string('page_image')->default('')->comment = '页面缩略图';
                $table->string('summary', 255)->default('')->comment = '摘要';
                $table->text('content')->nullable()->comment = '正文';
                $table->integer('views')->default(0)->comment = '浏览量';
                $table->integer('user_id')->default(0)->comment = '发布者id';
                $table->tinyInteger('status')->default(1)->comment = '发布状态';
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
