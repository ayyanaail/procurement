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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('pq_no')->nullable();
            $table->date('pq_date')->nullable();
            $table->string('pi_no')->nullable();
            $table->date('pi_date')->nullable();
            $table->decimal('ap_value', 15, 2)->nullable();
            $table->date('ap_date')->nullable();
            $table->string('ci_no')->nullable();
            $table->date('ci_date')->nullable();
            $table->string('bl_no')->nullable();
            $table->date('bl_date')->nullable();
            $table->decimal('bp_value', 15, 2)->nullable();
            $table->date('bp_date')->nullable();
            $table->date('eta')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
