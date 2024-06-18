<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garden', function (Blueprint $table) {
            $table->increments('garden_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pot_id');
            $table->integer('pot_time_start');
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
        Schema::dropIfExists('garden');
    }
}
