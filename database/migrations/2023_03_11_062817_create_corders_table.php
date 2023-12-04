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
        Schema::create('corders', function (Blueprint $table) {
            $table->id();
            $table->string("customer_id");
            $table->string("customer_email");
            $table->string("customer_name");
            $table->string("payment_method");
            $table->string('product_id');
            $table->string("product_name");
            $table->integer("product_qty");
            $table->integer("product_price");
            $table->longText("address");
            $table->longText("invoice_number");
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('corders');
    }
};
