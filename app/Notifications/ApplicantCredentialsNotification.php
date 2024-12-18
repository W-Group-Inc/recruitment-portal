<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicantCredentialsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $applicant;
    protected $password;
    protected $name;
    public function __construct($user, $applicant, $password, $name)
    {
        $this->user = $user;
        $this->applicant = $applicant;
        $this->password = $password;
        $this->name = $name;
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
                    ->subject('Wee Recruit Login Credentials')
                    ->greeting('Hello '.$this->user->prefix.' '.$this->user->name)
                    ->line('An account has been created for you. Log in to your account with the credentials listed below.')
                    ->line('Email : ' . $this->applicant->email)
                    ->line('Password : '.$this->password)
                    ->action('Go to Website', url('/'));
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
