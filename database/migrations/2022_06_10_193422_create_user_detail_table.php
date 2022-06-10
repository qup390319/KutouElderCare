<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id('detail_id')->autoIncrement();
            $table->string('id_num')->nullable();
            $table->string('blood')->nullable();
            $table->string('hand')->nullable();
            $table->string('sit')->nullable();
            $table->float('user_tall')->nullable();
            $table->float('user_weight')->nullable();
            $table->float('user_bfr')->nullable();
            $table->date('record_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_detail');
    }
}
