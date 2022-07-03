<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // $table->string('order_id');
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            // $table->string('prod_id');
            $table->foreignId('prod_id')->constrained('products')->cascadeOnDelete();
            $table->string('qty');
            $table->string('price');
            $table->string('size');
            $table->string('color');
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
        Schema::dropIfExists('order_items');
    }
};
