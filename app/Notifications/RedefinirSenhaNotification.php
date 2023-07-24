<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $url = 'http://localhost:8000/password/reset/'.$this->token;
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        return (new MailMessage)
            ->subject('Atualização de Senha')
            ->line('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta')
            ->action('Clique aqui para modificar a senha', $url)
            ->line('Este link de redefinição de senha expirará em '.$minutos.' minutos.')
            ->line('Se você não solicitou uma redefinição de senha, nenhuma outra ação é necessária.');
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
