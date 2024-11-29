<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
// use Illuminate\Bus\Queueable;

class RegularizeRequestNotification extends Notification
{

    /**
     * Create a new notification instance.
     */
    protected $request;

    /**
     * Create a new notification instance.
     *
     * @param mixed $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the database representation of the notification.
     *
     * @return array<string, mixed>
     */

     public function via($notifiable)
    {
        return ['database'];
    }
    public function toDatabase($notifiable)
    {  
        $userName = $this->request->user->name;
        return [
            'message' => $userName.' has requested a regularize request.  ',
            'link' => url('/attendancePage?tab=tab3'), // Link to the  requests page
        ];
    }
}
