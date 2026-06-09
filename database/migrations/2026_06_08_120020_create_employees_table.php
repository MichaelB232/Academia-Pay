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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("nama_karyawan")->isNotEmpty();
            $table->string("niy")->unique()->isNotEmpty();
            $table->boolean("status_aktif")->default(true);
            $table->double("gaji_pokok")->default(0.0)->isNotEmpty(); #Gaji Pokok
            $table->foreignId("position_id")->constrained('positions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
