<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductColorTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_colors_temp', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            

            $table->string('color')->nullable();
            $table->string('type')->nullable();
            $table->integer('stock')->nullable();
            $table->string('individual')->nullable();
            
            $table->boolean('status')->default(true)->comment('0=incative, 1=active');
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
        Schema::dropIfExists('product_colors_temp');
    }
}
