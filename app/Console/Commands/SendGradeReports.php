<?php

namespace App\Console\Commands;

use App\Models\Grade;
use App\Models\User;
use App\Notifications\GradeReport;
use Illuminate\Console\Command;

class SendGradeReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-grade-reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $students = User::whereRole('student')->get();
        foreach ($students as $student) {
            $grades = Grade::where('student_id', $student->id)
                ->join('classroom_subject', 'grades.classroom_code', '=', 'classroom_subject.classroom_code')
                ->select('classroom_subject.subject_name', 'grades.grade_type', 'grades.score')
                ->get();

            $student->notify(new GradeReport($grades));
        }

        $this->info('Báo cáo kết quả học tập đã được gửi.');
    }
}
