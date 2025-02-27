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
            $table->integer('sothutu')->nullable();
            $table->string('MaHocPhan', 50); 
            $table->string('TenHocPhan', 100);
            $table->string('TenHocPhanTiengAnh', 100);
            $table->integer('SoTinChi');
            $table->integer('SoTietLyThuyet'); 
            $table->integer('SoTietThucHanh');
            $table->integer('HocKy');
            $table->integer('DkTienQuyet');
            $table->integer('DkHocTruoc');
            $table->integer('DkSongHanh');
            $table->unsignedBigInteger('KhoiKienThucID')->nullable();
            $table->unsignedBigInteger('LoaiHocPhanID')->nullable();
            $table->foreign('KhoiKienThucID')->references('id')->on('khoikienthucs');
            $table->foreign('LoaiHocPhanID')->references('id')->on('loaihocphans');

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
