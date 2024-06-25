<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge', function (Blueprint $table) {
            $table->id();
            $table->string('badge_name', 255);
            $table->string('badge_image', 255)->nullable();
            $table->integer('badge_price');
            $table->text('badge_description')->nullable();
            $table->enum('badge_buy', ['Y', 'N'])->default('Y');
            $table->string('badge_type', 255);
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge');
    }
}
