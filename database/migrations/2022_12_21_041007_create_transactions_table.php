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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->index();
            $table->longText('details');
            $table->integer('payment');
            $table->integer('grand');
            $table->integer('status');
            $table->string('type');
            $table->string('transaction_date');
            $table->integer('payment_installments')->nullable();
            $table->integer('payment_number')->nullable();
            $table->integer('autorization_number')->nullable();
            $table->decimal('agreed_rate')->nullable();
            $table->decimal('billed_EA')->nullable();

            $table->foreignId('category_id')->constrained()->delete('cascade');
            $table->foreignId('budget_id')->constrained()->delete('cascade');
            $table->foreignId('users_id')->constrained()->delete('cascade');

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
};
