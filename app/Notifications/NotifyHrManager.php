<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyHrManager extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $mrf;
    protected $action;
    public function __construct($user, $mrf, $action)
    {
        $this->user = $user;
        $this->mrf = $mrf;
        $this->action = $action;
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
        if ($this->action == 'cancelled')
        {
            return (new MailMessage)
                        ->subject('MRF Notification')
                        ->greeting('Good day, '.$this->user->prefix.' '. $this->user->name)
                        ->line('This email is to inform you that the MRF for the '.$this->mrf->jobPosition->position.' position has been canceled.')
                        ->action('View MRF', url('/mrf'));
                        // ->line('Thank you for using our application!');
        }

        return (new MailMessage)
                    ->subject('MRF for Approval')
                    ->greeting('Good day, '.$this->user->prefix.' '. $this->user->name.'!')
                    ->line('You have an MRF pending for approval.')
                    ->action('For Approval', url('/for-approval'));
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
            
        ];
    }
}
