<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
                $table->increments('id');
                $table->enum('type', ['news', 'photo'])->default('news')->comment = '评论所属类型';
                $table->integer('relation_id')->default(0)->comment = '关联id';
                $table->string('ip', 15)->default('')->comment = '评论者所在地ip';
                $table->text('content')->comment = '评论内容';
                $table->integer('user_id')->default(0)->comment = '评论者id';
                $table->softDeletes();
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
		Schema::drop('comments');
	}

}
