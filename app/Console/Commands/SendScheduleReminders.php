<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Notifications\ScheduleReminder;

class SendScheduleReminders extends Command
{
    protected $signature = 'schedule:remind';
    protected $description = 'Gửi nhắc nhở lịch học và lịch dạy';

    public function handle()
    {
        $now = Carbon::now();
        $upcomingSchedules = Schedule::where('date', $now->toDateString())
            ->where('start_time', '>', $now->toTimeString())
            ->where('start_time', '<=', $now->addHours(2)->toTimeString())
            ->with(['classroom.users', 'subject', 'teacher'])
            ->get();

        foreach ($upcomingSchedules as $schedule) {
            // Gửi nhắc nhở cho giảng viên
            $schedule->teacher->notify(new ScheduleReminder($schedule, 'teacher'));

            // Gửi nhắc nhở cho sinh viên trong lớp
            foreach ($schedule->classroom->users as $student) {
                $student->notify(new ScheduleReminder($schedule, 'student'));
            }
        }

        $this->info('Nhắc nhở lịch học và lịch dạy đã được gửi!');
    }
}
