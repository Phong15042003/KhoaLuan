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
        Schema::create('nganhhocs', function (Blueprint $table) {
            $table->id();
            $table->string('MaNganh', 50)->unique();
            $table->string('TenNganh', 100);
            $table->unsignedBigInteger('BoMonID')->nullable();
            $table->foreign('BoMonID')->references('id')->on('bomons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nganhhocs');
    }
};
