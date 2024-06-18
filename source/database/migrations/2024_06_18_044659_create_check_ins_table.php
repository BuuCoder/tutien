<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckInsTable extends Migration
{
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('before_checkin')->nullable();
            $table->integer('count_checkin')->default(0);
            $table->tinyInteger('received_gift')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('check_ins');
    }
}
