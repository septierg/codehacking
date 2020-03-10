<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            //creating relation with the post , user itself
            $table->integer('comment_id');
            $table->integer('is_active')->default(0);
            $table->string('author');

            $table->string('email');
            $table->text('body');
            $table->timestamps();

            //use the method foreign to check the id vs the user_id on the users, then we delete on cascade
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment_replies');
    }
}
