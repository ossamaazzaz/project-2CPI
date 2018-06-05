<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \App\Orders;
use App\Notifications\CustomDbChannel;
use Illuminate\Notifications\Messages\BroadcastMessage;

class Confirmation extends Notification
{
    use Queueable;

    /**
    * for every user many notifications
    */

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Orders $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDbChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('facture/'. $this->order->code);
        return (new MailMessage)
                    ->line('hey !')
                    ->line('ton ordre a etait tres bien valider ,veuillez consulter le lien suivant : ')
                    ->action('Ton bon de commande :', $url)
                    ->line('merci !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->order->code;
    }
    public function toDatabase($notifiable)
    {
        return $this->order->code; //<-- send the id here
    }



    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => $this->order->code,
        ]);
    }

    
}
