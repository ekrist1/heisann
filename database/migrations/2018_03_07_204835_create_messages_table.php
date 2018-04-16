<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('group_id')->nullable();
            $table->string('hashed_url')->unique();
            $table->string('password')->nullable();
            $table->string('from');
            $table->string('to');
            $table->string('mobile');
            $table->text('body')->nullable();
            $table->string('is_read')->default(false);
            $table->boolean('is_received')->default(false);
            $table->string('received_from')->nullable();
            $table->string('received_phone')->nullable();
            $table->string('received_company')->nullable();
            $table->date('time_live');
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
        Schema::dropIfExists('messages');
    }
}
