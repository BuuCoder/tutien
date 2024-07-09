<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_potion', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');
            $table->integer('potion_id');
            $table->integer('furnace_id');
            $table->integer('created_at');
            $table->integer('crafting_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_potion');
    }
}
