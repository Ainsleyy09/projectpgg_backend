<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GuideNotification extends Notification
{
    use Queueable;

    public $registration;
    public $startPoint;
    public $endPoint;
    public $paymentType;

    public function __construct($registration, $startPoint, $endPoint, $paymentType)
    {
        $this->registration = $registration;
        $this->startPoint = $startPoint;
        $this->endPoint = $endPoint;
        $this->paymentType = $paymentType;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Konfirmasi Pendaftaran - Palembang Good Guide')
            ->markdown('emails.notification', [
                'registration' => $this->registration,
                'start_point' => $this->startPoint,
                'end_point' => $this->endPoint,
                'payment_type' => $this->paymentType,
            ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Pendaftaran nomor order ' . $this->registration->order_number,
            'order_number' => $this->registration->order_number,
            'status' => $this->registration->status,
        ];
    }
}
