<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineTable extends Migration
{
    public function up()
    {
        Schema::create('mine', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('mined_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mine');
    }
}
