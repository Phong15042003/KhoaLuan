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
        Schema::create('khoikienthucs', function (Blueprint $table) {
            $table->id();
            $table->string('MaKhoiKienThuc', 50)->unique();
            $table->string('TenKhoi', 100);
            $table->unsignedBigInteger('ChuongTrinhID')->nullable();
            $table->foreign('ChuongTrinhID')->references('id')->on('chuongtrinhdaotaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khoikienthucs');
    }
};
