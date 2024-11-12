<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReturnApplicantDOcuments extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $applicant;
    protected $applicant_documents;
    public function __construct($applicant, $applicant_documents)
    {
        $this->applicant = $applicant;
        $this->applicant_documents = $applicant_documents;
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
                    ->subject('Document Status')
                    ->greeting('Good day, ' .$this->applicant->user->prefix.' '.$this->applicant->user->name)
                    ->line('We would like to inform you that we have returned the document you uploaded.')
                    ->line('Document : '. $this->applicant_documents->document->document_name)
                    ->line('Remarks : '. $this->applicant_documents->remarks)
                    ->action('View Applicant Documents', url('/applicant-documents'))
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
