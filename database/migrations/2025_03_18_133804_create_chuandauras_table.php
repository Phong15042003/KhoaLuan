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
        Schema::create('chuandauras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hocphan_id');
            $table->string('T1')->nullable();
            $table->string('T2')->nullable();
            $table->string('T3')->nullable();
            $table->string('T4')->nullable();
            $table->string('T5')->nullable();
            $table->string('T6')->nullable();
            $table->string('T7')->nullable();
            $table->string('T8')->nullable();
            $table->foreign('hocphan_id')->references('id')->on('hocphans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuandauras');
    }
};
