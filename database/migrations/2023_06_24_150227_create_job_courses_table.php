<?php

use Dompdf\FrameDecorator\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // جدول تخزين الدورات والوظائف
        //يمكننا فصله لجدولين
        Schema::create('job_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('des_job_course');
            $table->date('start');
            $table->date('end');
            $table->string('nationality');
            $table->string('age');
            $table->enum('gender', ['ذكر', 'أنثى', 'كلاهما']);
            $table->longText('skill');
            $table->longText('responsibilities');
            $table->string('type_of_working');
            $table->string('years_of_experience');
            $table->longText('required_documents');
            $table->decimal('course_cost');
            $table->string('lang');
            $table->boolean('accept')->default(0);
            $table->boolean('see')->default(0);
            $table->string('bank_name')->nullable();
            $table->string('account')->nullable();
            $table->decimal('money')->nullable();
            $table->string('process_number')->nullable();
            $table->enum('type', ['job', 'course']);
            $table->unsignedBigInteger('jobtype_id');
            $table->foreign('jobtype_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_courses');
    }
};