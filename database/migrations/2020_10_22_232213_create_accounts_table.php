<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_num')->unique();
            $table->unsignedDecimal('balance', 60, 2);
            $table->enum('type', ['current', 'saving', 'credit', 'joint']);
            $table->string('currency');
            $table->boolean('is_active');
            // $table->enum('currency', ['USD', 'EUR', 'EGP', 'SAR', 'GBP', 'CAD', 'JPY', 'AUD', 'AED']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
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
        Schema::dropIfExists('accounts');
    }
}
