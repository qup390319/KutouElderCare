<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id('user_id')->autoIncrement();
            $table->string('id_num')->default('0');
            $table->string('account')->nullable();
            $table->string('password')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('auth')->nullable()->default('1');
            $table->date('user_birth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
