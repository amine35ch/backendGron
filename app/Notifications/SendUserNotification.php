<?php

namespace App\Notifications;

use App\Models\PSmtp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendUserNotification extends Notification
{
    use Queueable;

    private $entitled;

    private $subject;

    private $description;

    private $credentials;

    private $tradeName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject, $description, $credentials, $tradeName)
    {
        $this->subject = $subject;
        $this->description = $description;
        $this->credentials = $credentials;
        $this->tradeName = $tradeName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $companyId = getMarCompany()[0] ?? null;
        if ($companyId) {
            $pSmtp = PSmtp::where('d_company_id',$companyId )->first();
        }
        else {
            $pSmtp = PSmtp::first();
        }
        $subject = $this->subject;
        $description = $this->description;
        $credentials = $this->credentials;
        $tradeName = $this->tradeName;
        if ($pSmtp) {
            $mailMessage = (new MailMessage())
                ->subject($subject)
                ->from($pSmtp->mail_from_address, $pSmtp->mail_from_name);
        } else {
            $mailMessage = (new MailMessage())
                ->subject($subject);
        }
        if ($tradeName) {
            $mailMessage->greeting('Bonjour ' . $this->tradeName);
        }
        $mailMessage->line($description);
        if (!is_null($credentials)) {
            $mailMessage->line('Vous pouvez vous connecter en utilisant les informations suivantes :')
                ->line('Nom d\'utilisateur: ' . $credentials['username'])
                ->line('Mot de passe: ' . $credentials['password'])
                ->line('Code Société: ' . $credentials['company_code']);
        }
        $mailMessage->line('Pour accéder à la plateforme, cliquez sur le Bouton :')
            ->action('CRM GRON', config('app.url'));

        $mailMessage->line(" Nous serons à votre disposition pour tout complément d'information.");
        $mailMessage->salutation('Cordialement,');
        $mailMessage->line('L’équipe Gron.');

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
