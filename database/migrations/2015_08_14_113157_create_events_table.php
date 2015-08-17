<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment = '活动名称';
            $table->string('event_image')->default('')->comment = '活动头图';
            $table->dateTime('begin_time')->default('0000-00-00 00:00:00')->comment = '活动开始时间';
            $table->dateTime('end_time')->default('0000-00-00 00:00:00')->comment = '活动结束时间';
            $table->text('content')->comment = '活动详情';
            $table->integer('user_count')->default(0)->comment = '参与活动总人数';
            $table->integer('user_id')->default(0)->comment = '活动创建者';
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
        Schema::drop('events');
    }
}
