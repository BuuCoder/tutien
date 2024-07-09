<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potion', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('image');
            $table->integer('crafting_time');
            $table->text('required_ingredients');
            $table->integer('reward_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potion');
    }
}
