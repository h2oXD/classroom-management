<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GradeReport extends Notification
{
    use Queueable;

    protected $grades;

    public function __construct($grades)
    {
        $this->grades = $grades;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('Báo cáo kết quả học tập')
            ->line('Dưới đây là kết quả học tập của bạn:');

        foreach ($this->grades as $grade) {
            $mail->line("Môn học: {$grade->subject_name}, Loại điểm: {$grade->grade_type}, Điểm: {$grade->score}");
        }

        $mail->line('Cảm ơn bạn đã sử dụng hệ thống!');
        return $mail;
    }
}
