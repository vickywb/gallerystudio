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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('invoice_id');
            $table->string('external_id');
            $table->decimal('amount', 16, 2);
            $table->string('currency')->default('IDR');
            $table->string('status')->default('PENDING');
            $table->string('description')->nullable();
            $table->integer('invoice_duration')->default('86400');
            $table->string('invoice_url');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
