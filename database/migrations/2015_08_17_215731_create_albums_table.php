<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('album_name')->comment = '相册名';
            $table->string('album_desc')->default('')->comment = '相册描述';
            $table->enum('album_type', array('people'))->default('people')->comment = '相册类型，比如：人物、家居等';
            $table->string('cover_image')->default('')->comment = '封面图片';
            $table->integer('photo_count')->default(0)->comment = '照片数';
            $table->integer('user_id')->default(0)->comment = '所属用户';
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
        Schema::drop('albums');
    }
}
