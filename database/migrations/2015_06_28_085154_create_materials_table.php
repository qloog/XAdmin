<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('parent_id')->default(0);
                $table->tinyInteger('material_type')->default(0);
                $table->string('title', 64);
                $table->string('media_id', 50)->default('');
                $table->string('pic_url', 150)->default('');
                $table->tinyInteger('is_show_pic')->default(1);
                $table->tinyInteger('replay_type')->default(1);
                $table->string('summary', 255)->default('');
                $table->text('content')->nullable();
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
        Schema::drop('users');
    }
}
