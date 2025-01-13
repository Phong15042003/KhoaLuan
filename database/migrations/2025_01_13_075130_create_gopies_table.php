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
        Schema::create('gopies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SinhVienID');
            $table->unsignedBigInteger('HocPhanID');
            $table->text('NoiDung');
            $table->date('NgayGopY')->default(DB::raw('CURRENT_DATE'));
            $table->foreign('SinhVienID')->references('id')->on('users');
            $table->foreign('HocPhanID')->references('id')->on('hocphans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gopies');
    }
};
