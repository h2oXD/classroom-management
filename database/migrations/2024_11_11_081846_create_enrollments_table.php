<?php

use App\Models\Classroom;
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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Classroom::class)->constrained()->onDelete('cascade');
            $table->date('enrollment_date')->comment("Ngày đăng ký");
            $table->enum('status', ['approved', 'pending', 'canceled'])->default('pending')->comment("Trạng thái đăng ký (đã duyệt, chờ duyệt, hủy)");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
