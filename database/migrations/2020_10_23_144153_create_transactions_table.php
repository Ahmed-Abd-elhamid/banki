<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_num')->unique();
            $table->enum('type', ['deposit', 'withdraw', 'transfer']);
            $table->unsignedDecimal('money_in', 9, 2)->nullable();
            $table->unsignedDecimal('money_out', 9, 2)->nullable();
            $table->unsignedBigInteger('transfer_from')->nullable();
            // $table->enum('currency', ['USD', 'EURO', 'EGP', 'SAR', 'YEN']);
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
        Schema::dropIfExists('transactions');
    }
}
