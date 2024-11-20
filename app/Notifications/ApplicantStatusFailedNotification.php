<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicantStatusFailedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $applicant;
    public function __construct($applicant)
    {
        $this->applicant = $applicant;
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
                    ->subject('Applicant Status')
                    ->greeting('Hello Mr./Ms. '.$this->applicant->firstname.' '.$this->applicant->lastname)
                    // ->line('We would like to inform you that you have failed the initial interview for the position of ' . $this->applicant->mrf->position_title);
                    ->line('Though your qualifications are impressive, we have decided to move forward with a candidate whose experiences better meet our needs for this particular role. We hope you’ll keep us in mind and apply again in the future should you see a job opening for which you qualify. We thank you for your interest in joining our team and we wish you good luck in your future endeavors.')
                    ->line('Thank you so much and stay safe!');

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
