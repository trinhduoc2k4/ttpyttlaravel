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
        Schema::create('internal_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_department_id')->nullable()->constrained('departments')->nullOnDelete()->comment('khoa phòng gửi văn bản');
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete()->comment('người gửi');
            $table->string('title', 255)->comment('trích yếu');
            $table->string('code', 255)->comment('số ký hiệu');
            $table->enum('document_type', ['Luật', 'Quyết định', 'Thông tư', 'Nghị định', 'Nghị quyết', 'Chỉ thị'])->comment('loại văn bản');
            $table->date('issued_date')->nullable()->comment('ngày ban hành');
            $table->string('issuer', 255)->nullable()->comment('cơ quan ban hành');
            $table->string('file_path', 255)->comment('đường dẫn file văn bản');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_documents');
    }
};
