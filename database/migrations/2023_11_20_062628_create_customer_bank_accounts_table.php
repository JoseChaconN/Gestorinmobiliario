<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('account_holder', 150)->nullable();
            $table->integer('bank_id')->unsigned()->nullable();
            $table->integer('account_type')->unsigned()->nullable();
            $table->string('account_number',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_bank_accounts');
    }
};
