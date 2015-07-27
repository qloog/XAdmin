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
        Schema::create('news', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('page_image')->default('');
                $table->text('content')->nullable();
                $table->string('meta_description')->default('');
                $table->integer('user_id')->default(0);
                $table->tinyInteger('status')->default(1);
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
