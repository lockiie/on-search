<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('comment')->nullable(true);

            $table->unsignedBigInteger('alternative_id')->nullable(false);
            $table->foreign('alternative_id')->references('id')->on('alternatives');

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('father_id')->nullable(true);
            $table->foreign('father_id')->references('id')->on('responses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
};
