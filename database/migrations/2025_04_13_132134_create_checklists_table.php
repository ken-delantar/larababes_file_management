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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->boolean('form_137')->nullable()->default(false);
            $table->boolean('form_138')->nullable()->default(false);
            $table->boolean('good_moral')->nullable()->default(false);
            $table->boolean('psa')->nullable()->default(false);
            $table->boolean('pic')->nullable()->default(false);
            $table->boolean('esc_certificate')->nullable()->default(false);
            $table->boolean('diploma')->nullable()->default(false);
            $table->boolean('brgy_certificate')->nullable()->default(false);
            $table->boolean('ncae')->nullable()->default(false);
            $table->boolean('af_five')->nullable()->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
