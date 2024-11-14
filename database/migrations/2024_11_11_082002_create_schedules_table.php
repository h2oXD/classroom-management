<?php

use App\Models\Classroom;
use App\Models\ClassroomSubject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classroom::class)->constrained()->onDelete('cascade');
            $table->string('day_of_week')->comment("Ngày trong tuần");
            $table->time('start_time')->comment("Thời gian bắt đầu");
            $table->time('end_time')->comment("Thời gian kết thúc");
            $table->string('location')->nullable()->comment("Phòng học");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
