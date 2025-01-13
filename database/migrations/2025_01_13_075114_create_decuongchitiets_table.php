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
        Schema::create('decuongchitiets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('HocPhanID');
            $table->text('NoiDung');
            $table->date('NgayCapNhat')->default(DB::raw('CURRENT_DATE'));
            $table->foreign('HocPhanID')->references('id')->on('hocphans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decuongchitiets');
    }
};
