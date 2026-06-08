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
        Schema::create('table_payroll_deductions_tab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_id')->constrained('payrolls');
            $table->string('nama_potongan')->isNotEmpty();
            $table->string('deskripsi');
            $table->double('nominal_potongan')->isNotEmpty();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_payroll_deductions_tab');
    }
};
