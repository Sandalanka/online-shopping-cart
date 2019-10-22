<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->integer('iteam_id');
            $table->string('quantity');
            $table->integer('price');
            $table->integer('bill');
            $table->string('user_name');
            $table->integer('user_id');
            $table->string('address');
            $table->date('order_date');
            $table->date('reciver_date');
             $table->string('photos');
             $table->enum('status', array('mail', 'recived'));
             $table->rememberToken();
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
        Schema::dropIfExists('orders');
    }
}
