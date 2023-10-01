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
        // هذا جدول كسر بين المستخدم والوظيفة لتخزين الوظائف التي سجل عليها المستخدم
        Schema::create('user_j_s', function (Blueprint $table) {
            $table->id();
            $table->unique(['user_id', 'job_id']);
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('job_id')->references('id')->on('job_courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_j_s');
    }
};
