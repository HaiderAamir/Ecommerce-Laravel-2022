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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string("session_id");
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->string("customer_email")->nullable();
            $table->string("customer_name")->nullable();
            $table->string("payment_method")->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string("product_name");
            $table->integer("product_qty");
            $table->integer("product_price");
            $table->longText("address")->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('carts');
    }
};
