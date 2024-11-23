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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants'); //otomatis ngambil primary key
            $table->unsignedBigInteger('id_scan');
            $table->timestamp('scan_at')->nullable();

            $table->unsignedBigInteger('scan_by');
            $table->foreign('scan_by')->references('id')->on('users'); //ambil primary key manual

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
