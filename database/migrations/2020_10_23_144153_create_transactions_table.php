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
            $table->string('transaction_num');
            $table->unsignedDecimal('balance', 9, 2);
            $table->enum('type', ['deposite', 'withdraw', 'transfer']);
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('to_account_id')->constrained('accounts')->onDelete('cascade')->nullable();
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
