<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlchemyFurnaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alchemy_furnace', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('image');
            $table->integer('usage_fee');
            $table->integer('time_reduction_percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alchemy_furnace');
    }
}
