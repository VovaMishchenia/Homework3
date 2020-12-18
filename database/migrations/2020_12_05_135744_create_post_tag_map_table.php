<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag_map', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
           $table->foreign('post_id')->references('id')->on('post')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
               $table->foreign('tag_id')->references('id')->on('tag')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('post_tag_map');
    }
}
