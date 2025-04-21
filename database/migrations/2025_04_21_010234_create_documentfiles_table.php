<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->binary('form_137')->nullable();
            $table->binary('form_138')->nullable();
            $table->binary('good_moral')->nullable();
            $table->binary('psa')->nullable();
            $table->binary('pic')->nullable();
            $table->binary('esc_certificate')->nullable();
            $table->binary('diploma')->nullable();
            $table->binary('brgy_certificate')->nullable();
            $table->binary('ncae')->nullable();
            $table->binary('af_five')->nullable();
        });

        DB::statement('ALTER TABLE document_files MODIFY COLUMN form_137 LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN form_138 LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN good_moral LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN psa LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN pic LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN esc_certificate LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN diploma LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN brgy_certificate LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN ncae LONGBLOB');
        DB::statement('ALTER TABLE document_files MODIFY COLUMN af_five LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentfiles');
    }
};
