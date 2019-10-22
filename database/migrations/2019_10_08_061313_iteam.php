<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Iteam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
 { 
    Schema::create('iteam', function (Blueprint $table) {
     $table->bigIncrements('id');
        $table->string('name');
        $table->string('category');
        $table->integer('price');
        $table->string('description');
        $table->string('photos');
        $table->enum('status', array('active', 'inactive'));
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
        //
    }
}
