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
        Schema::create('khoahocs', function (Blueprint $table) {
            $table->id();
            $table->string('MaKhoaHoc', 50)->unique();
            $table->string('TenKhoaHoc', 100);
            $table->unsignedBigInteger('CTDT_ID')->nullable();
            $table->string('NamBatDau', 20);
            $table->string('NamKetThuc', 20);
            $table->foreign('CTDT_ID')->references('id')->on('chuongtrinhdaotaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khoahocs');
    }
};
