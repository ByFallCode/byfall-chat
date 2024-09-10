<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('init_params', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('siteweb', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('init_params');
    }
}
