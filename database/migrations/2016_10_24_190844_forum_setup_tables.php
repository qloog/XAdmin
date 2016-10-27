<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0)->comment('父级id');
            $table->string('name')->comment('分类名');
            $table->string('slug', 60)->unique()->comment('缩略名');
            $table->string('description')->default('')->comment('描述');
            $table->tinyInteger('weight')->unsigned()->default(0)->comment('权重');
            $table->integer('topic_count')->unsigned()->default(0)->comment('帖子数');
            $table->integer('user_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('forum_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->text('body')->comment('帖子内容');
            $table->integer('view_count')->default(0)->comment('浏览数');
            $table->integer('reply_count')->default(0)->comment('回复数');
            $table->integer('vote_count')->default(0)->comment('投票数');
            $table->enum('is_excellent', ['yes', 'no'])->default('no')->comment('是否加精帖子');
            $table->enum('is_blocked', ['yes', 'no'])->default('no')->comment('是否block帖子');
            $table->integer('last_reply_user_id')->unsigned()->default(0)->index()->comment('最后回复用户');
            $table->string('source')->default('')->comment('访问来源 iOS，Android, PC');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('创建者id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('forum_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->default(0)->index()->comment('帖子id');
            $table->text('body')->commnet('回复的内容');
            $table->integer('vote_count')->unsigned()->default(0)->comment('投票数');
            $table->enum('is_blocked', ['yes', 'no'])->default('no')->comment('是否block帖子');
            $table->string('source')->default('')->comment('访问来源 iOS，Android, PC');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('创建者id');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_categories');
        Schema::drop('forum_topics');
        Schema::drop('forum_replies');
    }
}
