<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinedLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combined_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('customerLedger_id');
            $table->string('particulars')->nullable();
            $table->string('referance_no')->nullable();
            $table->string('debit')->default('0')->nullable();
            $table->string('credit')->default('0')->nullable();
            $table->string('balance')->default('0')->nullable();
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
        Schema::dropIfExists('combined_ledgers');
    }
}