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
        Schema::create('internal_document_receivers', function (Blueprint $table) {
            $table->id();
            // Văn bản nội bộ
            $table->foreignId('internal_document_id')
                ->constrained('internal_documents')
                ->cascadeOnDelete();

            // Nhận theo khoa/phòng
            $table->foreignId('department_id')
                ->constrained('departments')
                ->cascadeOnDelete();

            // Nhận theo user cụ thể
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_document_receivers');
    }
};
