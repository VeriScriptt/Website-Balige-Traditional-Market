<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $this->from = env('TWILIO_WHATSAPP_FROM');
    }

    public function sendWhatsAppMessage($to, $message)
    {
        $to = "whatsapp:" . preg_replace('/\D/', '', $to);  // Ensure the number is in the correct format
        $from = $this->from;

        return $this->client->messages->create(
            $to,
            [
                'from' => $from,
                'body' => $message
            ]
        );
    }
}
