<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewApplicantEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $recruiter;
    protected $user;
    protected $mrf;
    public function __construct($recruiter, $user, $mrf)
    {
        $this->recruiter = $recruiter;
        $this->user = $user;
        $this->mrf = $mrf;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Applicant')
                    ->greeting('Good day '. $this->user->prefix.' '.$this->recruiter->name.',')
                    ->line('You have a new applicant for the '.$this->mrf->jobPosition->position.' position.')
                    ->action('View Applicant', url('/applicant'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
