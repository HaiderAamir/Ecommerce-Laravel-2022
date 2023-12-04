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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_id")->default("null");
            $table->string("name")->default("null");
            $table->string("category")->default("null");
            $table->string("sub_category")->default("null");
            $table->longtext("size")->nullable();
            $table->integer("price")->default(0);
            $table->longtext("details")->nullable();
            $table->integer("top")->default(0);
            $table->integer("sale_price")->default(0);
            $table->integer("sale_active")->default(0);
            $table->integer("qty")->default(0);
            $table->integer("status")->default(0);
            $table->string("pic1")->null();
            $table->string("pic2")->null();
            $table->string("pic3")->null();
            $table->string("pic4")->null();
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
        Schema::dropIfExists('products');
    }
};
