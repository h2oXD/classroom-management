<?php

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
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
        Schema::create('classroom_subject', function (Blueprint $table) {
            $table->foreignIdFor(Classroom::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Subject::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Teacher::class)->constrained()->onDelete('cascade');
            $table->string('classroom_code')->unique();
            $table->primary(['classroom_id','subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_subject');
    }
};
