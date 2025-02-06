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
        Schema::create('hocphans', function (Blueprint $table) {
            $table->id();
            $table->string('MaHocPhan', 50)->unique();
            $table->string('TenHocPhan', 100);
            $table->string('TenHocPhanTiengAnh', 100);
            $table->integer('SoTinChi');
            $table->integer('SoTietLyThuyet'); 
            $table->integer('SoTietThucHanh');
            $table->unsignedBigInteger('KhoiKienThucID')->nullable();
            $table->unsignedBigInteger('LoaiHocPhanID')->nullable();
            $table->unsignedBigInteger('NhomHocPhanID')->nullable();
            $table->foreign('KhoiKienThucID')->references('id')->on('khoikienthucs');
            $table->foreign('LoaiHocPhanID')->references('id')->on('loaihocphans');
            $table->foreign('NhomHocPhanID')->references('id')->on('nhomhocphans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hocphans');
    }
};
