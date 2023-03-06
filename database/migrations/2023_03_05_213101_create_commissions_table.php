<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->foreignId('affiliate_user_id')->constrained('affiliate_users');
            $table->foreignId('through_user_id')->nullable()->constrained('affiliate_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
