<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InterviewerNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $interviewer;
    protected $user;
    public function __construct($interviewer, $user)
    {
        $this->interviewer = $interviewer;
        $this->user = $user;
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
                    ->subject('Assign Interviewer')
                    ->greeting('Good day, '.$this->user->prefix.' '.$this->user->name)
                    ->line('You have been assigned as the interviewer for the applicant.')
                    ->line('Applicant Name: '.$this->interviewer->applicant->user->name)
                    ->line('Job Position: '.$this->interviewer->mrf->jobPosition->position)
                    ->action('View Applicant', url('/applicant'))
                    ->line('Thank you for using our application!');
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
