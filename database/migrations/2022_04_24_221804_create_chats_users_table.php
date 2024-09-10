<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_users', function (Blueprint $table) {
            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('user_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['chat_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats_users');
    }
}
