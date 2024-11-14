<?php

use App\Models\ClassroomSubject;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained()->onDelete('cascade');
            $table->string('classroom_code');
            $table->foreign('classroom_code')->references('classroom_code')->on('classroom_subject')->onDelete('cascade');
            $table->string('grade_type')->comment("Loại điểm (bài tập, kiểm tra giữa kỳ, thi cuối kỳ)");
            $table->float('score')->nullable()->comment("Điểm số");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
