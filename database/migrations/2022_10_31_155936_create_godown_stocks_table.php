<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGodownStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('godown_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_quantity')->nullable();
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
        Schema::dropIfExists('godown_stocks');
    }
}