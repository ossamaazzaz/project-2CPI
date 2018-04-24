<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                     ->success()
                     ->subject('Inscription sur la platforme E-com')
                     ->line('Votre compte sur la platforme E-com a bien été crée , pour le valider veuillez cliquer sur le lien suivant :')
                     ->action('Confirmer mon compte', url("/confirm/{$notifiable->id}/".urlencode($notifiable->confirmation_token)))
                     ->line('Ce lien est valable pendant 24 heures. Veuillez ne pas transferer cet e-mail à d\'autres
                     personnes afin d\'eviter que quelqu\'un d\'autre ne puisse acceder à votre compte . ');
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
