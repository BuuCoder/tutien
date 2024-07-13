<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationUserTable extends Migration
{
    public function up()
    {
        Schema::create('conversation_user', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversation_user');
    }
}
