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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('organization');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('purpose');
            $table->text('comment')->nullable();
            // Поля архивариуса
            $table->text('salary_data')->nullable();
            $table->text('archivist_comment')->nullable();
            $table->string('archive_case_number')->nullable();
            $table->string('archivist_name')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
