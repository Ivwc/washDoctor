<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id','11');
            $table->dateTime('start_at');
            $table->string('content','40');
            $table->integer('customer',false, true)->length(11);
            $table->integer('creater',false, true)->length(11);
            $table->integer('taker',false, true)->length(11)->nullable();
            $table->string('notice','255')->nullable();
            $table->integer('store',false, true)->length(11);
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
        Schema::dropIfExists('todo');
    }
}
