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
        Schema::create('chuongtrinhdaotaos', function (Blueprint $table) {
            $table->id(); 
            $table->string('MaCTDT', 50); 
            $table->string('TenChuongTrinh', 100);
            $table->unsignedBigInteger('NganhHocID')->nullable();
            $table->foreign('NganhHocID')->references('id')->on('nganhhocs');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuongtrinhdaotaos');
    }
};
