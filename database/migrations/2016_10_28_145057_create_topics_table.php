<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->text('body')->comment('帖子内容');
            $table->integer('view_count')->unsigned()->default(0)->comment('浏览数');
            $table->integer('reply_count')->unsigned()->default(0)->comment('回复数');
            $table->integer('vote_count')->unsigned()->default(0)->comment('投票数');
            $table->enum('is_excellent', ['yes', 'no'])->default('no')->comment('是否加精帖子');
            $table->enum('is_blocked', ['yes', 'no'])->default('no')->comment('是否block帖子');
            $table->integer('last_reply_user_id')->unsigned()->default(0)->index()->comment('最后回复用户');
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
		Schema::drop('forum_topics');
	}

}
