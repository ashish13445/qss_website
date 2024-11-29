<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
// use Illuminate\Bus\Queueable;

class LeaveRequestNotification extends Notification
{

    /**
     * Create a new notification instance.
     */
    protected $leave;

    /**
     * Create a new notification instance.
     *
     * @param mixed $leave
     */
    public function __construct($leave)
    {
        $this->leave = $leave;
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
        $userName = $this->leave->user->name;
        $type = $this->leave->type;
        return [
            'message' => $userName.' has requested a '.$type,
            'link' => url('/leaves'), // Link to the leave requests page
        ];
    }
}
