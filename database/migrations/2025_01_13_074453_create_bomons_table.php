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
        Schema::create('bomons', function (Blueprint $table) {
            $table->id();
            $table->string('MaBoMon', 50)->unique();
            $table->string('TenBoMon', 100);
            $table->unsignedBigInteger('KhoaID')->nullable();
            $table->foreign('KhoaID')->references('id')->on('khoas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bomons');
    }
};
