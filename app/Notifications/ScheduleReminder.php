<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduleReminder extends Notification
{
    use Queueable;
    protected $schedule;
    protected $role;

    /**
     * Create a new notification instance.
     */
    public function __construct($schedule, $role)
    {
        $this->schedule = $schedule;
        $this->role = $role;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->role == 'student' ? 'Nhắc nhở lịch học' : 'Nhắc nhở lịch dạy';
        $line1 = $this->role == 'student'
            ? 'Bạn có lịch học sắp tới!'
            : 'Bạn có lịch dạy sắp tới!';
        return (new MailMessage)
            ->subject($subject)
            ->line($line1)
            ->line('Lớp: ' . $this->schedule->classroom->name)
            ->line('Môn học: ' . $this->schedule->subject->name)
            ->line('Thời gian: ' . $this->schedule->date . ' từ ' . $this->schedule->start_time . ' đến ' . $this->schedule->end_time)
            ->action('Xem chi tiết', url('/schedules'))
            ->line('Đừng quên tham gia đúng giờ!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'classroom' => $this->schedule->classroom->name,
            'subject' => $this->schedule->subject->name,
            'date' => $this->schedule->date,
            'start_time' => $this->schedule->start_time,
            'end_time' => $this->schedule->end_time,
            'role' => $this->role,
        ];
    }
}
