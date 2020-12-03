<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('messages', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('to_id');

        //     $table->integer('from_id');

        //     $table->string('subject');
        //     $table->longText('message');
            
        //     $table->boolean('status')->default(true)->comment('0=inactive, 1=active');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('messages');
    }
}
