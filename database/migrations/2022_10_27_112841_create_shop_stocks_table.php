<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('product_quantity_total')->nullable();
            $table->string('per_cost_price')->nullable();
            $table->string('per_selling_price')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('shop_stocks');
    }
}