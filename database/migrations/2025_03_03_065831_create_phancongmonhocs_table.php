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
        Schema::create('phancongmonhocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biensoan_id');
            $table->unsignedBigInteger('giangvien_id');
            $table->unsignedBigInteger('HocPhanID');
            $table->foreign('biensoan_id')->references('id')->on('users');
            $table->foreign('giangvien_id')->references('id')->on('users');
            $table->foreign('HocPhanID')->references('id')->on('hocphans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phancongmonhocs');
    }
};
