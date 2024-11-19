<?php

namespace App\Listeners;

use App\Events\SendWelcomeMail;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendWelcomeMail $event): void
    {
        $data = $event->user->toArray();
        Mail::send('email', $data, function ($message) use ($data){
            $message->to($data['email'], $data['email'])
                ->subject('Test Email');
        });
        // Mail::to($data->email)->send(new WelcomeMail($data));
    }
}
