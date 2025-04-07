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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('lrn')->unique();
            $table->string('sex');
            $table->string('school_origin');
            $table->string('condition')->default('Not Specified');
            $table->string('status')->default('Not Specified');
            $table->timestamps();
        });

        // Schema::create('strands', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('strand');
        //     $table->timestamps();
        // });

        // Schema::create('school_years', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('year_start');
        //     $table->integer('year_end');
        //     $table->date('start_of_class')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('sections', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
        //     $table->foreignId('strand_id')->constrained('strands')->onDelete('cascade');
        //     $table->string('section_name');
        //     $table->tinyInteger('grade_level'); // Optimized storage
        //     $table->timestamps();
        // });

        // Schema::create('academic_records', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        //     $table->foreignId('strand_id')->constrained('strands')->onDelete('cascade');
        //     $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
        //     $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
        //     $table->string('year_end_status');
        //     $table->timestamps();
        // });

        // Schema::create('documents', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('document_records', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
        //     $table->string('type');
        //     $table->longBlob('docs'); // Defined directly in migration
        //     $table->timestamps();
        // });

        // Schema::create('financial_records', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        //     $table->string('category')->default('Not Specified');
        //     $table->string('billing_status')->default('Not Specified');
        //     $table->string('vms_billing_status')->default('Not Applicable');
        //     $table->integer('approved_voucher')->nullable();
        //     $table->integer('payee_fee')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('remarks', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        //     $table->string('registrar_remark')->nullable();
        //     $table->string('archive_remark')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('remarks');
        // Schema::dropIfExists('financial_records');
        // Schema::dropIfExists('document_records');
        // Schema::dropIfExists('documents');
        // Schema::dropIfExists('academic_records');
        // Schema::dropIfExists('sections');
        // Schema::dropIfExists('school_years');
        // Schema::dropIfExists('strands');
        Schema::dropIfExists('students');
    }
};
