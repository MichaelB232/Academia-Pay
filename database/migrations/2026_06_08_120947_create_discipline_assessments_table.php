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
        Schema::create('discipline_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained('employees')->onDelete('cascade');
            $table->foreignId("period_id")->constrained('periods')->onDelete('cascade');
            $table->double('skor_kedisiplinan'); #Dalam bentuk persenan yang diisi oleh BIRO SDM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline_assessments');
    }
};
