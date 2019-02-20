<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Purchase;

class SupplierNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id; //Pega o id da purchase atual
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
        $purchase = Purchase::find($this->id);
        $url = url('api/enviaBoleto/'.$this->id); //Url da função que envia
        return (new MailMessage)                  // o boleto ao customer
                    ->greeting('Nova compra')
                    ->subject('Novo pedido de compra')
                    ->action('Enviar boleto', $url)
                    ->line('Obrigado por utilizar os nossos serviços!');
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
