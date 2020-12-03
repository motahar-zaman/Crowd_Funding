<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_temp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            
            $table->boolean('is_featured')->default(false);

            $table->string('title');
            $table->text('description');
            $table->text('explanation');
            $table->string('explanation_image')->nullable();
            $table->string('company_name');
            $table->text('company_info');
            $table->string('company_info_image')->nullable();
            $table->text('profile_info');
            $table->string('profile_info_image')->nullable();
            $table->float('price');
            $table->string('image');

            $table->string('colors')->nullable();

            $table->string('payment_option')->nullable();
            $table->string('account_option')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();

            $table->string('shipping_option')->nullable();
            $table->string('shipping_option_details')->nullable();
            $table->string('shipping_option_foreign')->nullable();
            $table->string('shipping_option_foreign_details')->nullable();
            $table->string('monday')->nullable();
            $table->string('tuesday')->nullable();
            $table->string('wednesday')->nullable();
            $table->string('thursday')->nullable();
            $table->string('friday')->nullable();
            $table->string('saturday')->nullable();
            $table->string('sunday')->nullable();
            $table->string('holyday')->nullable();
            $table->string('other_day')->nullable();
            $table->string('other_day_details')->nullable();
            $table->string('delivery_day')->nullable();
            $table->string('delivery_day_details')->nullable();


            $table->integer('card_id')->unsigned()->nullable();
            
            $table->integer('status')->default(0)->comment('0=pending for approval, 1=active, 2=out of stock, 3=hold, 4=rejected');
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
        Schema::dropIfExists('products_temp');
    }
}
