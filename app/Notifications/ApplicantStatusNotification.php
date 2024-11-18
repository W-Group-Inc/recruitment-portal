<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicantStatusNotification extends Notification
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
        if ($this->applicant->applicant_status == 'Passed')
        {
            return (new MailMessage)
                        ->subject('Applicant Status')
                        ->greeting('Hello Mr./Ms. '.$this->applicant->user->name)
                        ->line('Congratulations We would like to inform you that you have passed the final interview for the position of ' . $this->applicant->mrf->jobPosition->position.' .Please Login to our portal to submit the document requirements');
                        // ->action('Notification Action', url('/'))
                        // ->line('Thank you for using our application!');
        }

        return (new MailMessage)
                    ->subject('Applicant Status')
                    ->greeting('Hello Mr./Ms. '.$this->applicant->user->name)
                    ->line('We would like to inform you that you have passed the interview for the position of ' . $this->applicant->mrf->jobPosition->position);
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
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
