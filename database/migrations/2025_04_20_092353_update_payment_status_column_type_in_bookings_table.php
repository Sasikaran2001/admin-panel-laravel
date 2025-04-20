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
        Schema::table('bookings', function (Blueprint $table) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->string('payment_status')->default('pending')->change(); // Set default as 'pending'
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->integer('payment_status')->change(); // Change back to integer if needed
            });
        });
    }
};
