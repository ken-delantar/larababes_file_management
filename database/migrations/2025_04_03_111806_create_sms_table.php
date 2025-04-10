<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('condition')->nullable()->default('Not Specified');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('strands', function (Blueprint $table) {
            $table->id();
            $table->string('strand');
            $table->timestamps();
        });

        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->integer('year_start')->unique();
            $table->integer('year_end')->unique();
            $table->string('school_year');
            $table->date('start_of_class')->nullable();
            $table->timestamps();
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_number');
            $table->tinyInteger('grade_level'); // Optimized storage
            $table->timestamps();
        });

        Schema::create('academic_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('strand_id')->constrained('strands')->onDelete('cascade');
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->string('year_end_status')->nullable()->default('Not Specified');
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('document_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            $table->string('type');
            $table->binary('docs');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE document_records MODIFY COLUMN docs LONGBLOB');

        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('category')->default('Not Specified');
            $table->string('billing_status')->default('Not Specified');
            $table->string('vms_billing_status')->default('Not Applicable');
            $table->integer('approved_voucher')->nullable();
            $table->integer('payee_fee')->nullable();
            $table->timestamps();
        });

        Schema::create('remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('registrar_remark')->nullable();
            $table->string('archive_remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarks');
        Schema::dropIfExists('financial_records');
        Schema::dropIfExists('document_records');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('academic_records');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('school_years');
        Schema::dropIfExists('strands');
        Schema::dropIfExists('students');
    }
};
