<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class DokuPaymentController extends Controller
{
    public function checkoutPayment()
    {

        $currentDateTimeUTC = Carbon::now('UTC')->format('Y-m-d\TH:i:s\Z');

        $baseUrl = env('DOKU_URL');
        $clientId = env('DOKU_CLIENT_ID');
        $requestId = 'fdb69f47-96da-499d-acec-7cdc318ab2fe';
        $targetPath = '/checkout/v1/payment';
        $secretKey = env('DOKU_SECRET_KEY');



        $requestBody = [
            'order' => [
                'amount' => 80000,
                'invoice_number' => "INV-jaksadj90",
                'currency' => 'IDR',
                'callback_url' => 'http://doku.com/',
                'callback_url_cancel' => 'https://doku.com',
                'language' => 'EN',
                'auto_redirect' => true,
                'disable_retry_payment' => true,
                'line_items' => [
                    [
                        'id' => '001',
                        'name' => 'Fresh flowers',
                        'quantity' => 1,
                        'price' => 40000,
                        'sku' => 'FF01',
                        'category' => 'gift-and-flowers',
                        'url' => 'http://doku.com/',
                        'image_url' => 'http://doku.com/',
                        'type' => 'ABC',
                    ],
                    [
                        'id' => '002',
                        'name' => 'T-shirt',
                        'quantity' => 1,
                        'price' => 40000,
                        'sku' => 'T01',
                        'category' => 'clothing',
                        'url' => 'http://doku.com/',
                        'image_url' => 'http://doku.com/',
                        'type' => 'ABC',
                    ],
                ],
            ],
            'payment' => [
                'payment_due_date' => 60,
                'payment_method_types' => [
                    'VIRTUAL_ACCOUNT_BCA',
                    'VIRTUAL_ACCOUNT_BANK_MANDIRI',
                    'VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI',
                    'VIRTUAL_ACCOUNT_DOKU',
                    'VIRTUAL_ACCOUNT_BRI',
                    'VIRTUAL_ACCOUNT_BNI',
                    'VIRTUAL_ACCOUNT_BANK_PERMATA',
                    'VIRTUAL_ACCOUNT_BANK_CIMB',
                    'VIRTUAL_ACCOUNT_BANK_DANAMON',
                    'ONLINE_TO_OFFLINE_ALFA',
                    'CREDIT_CARD',
                    'DIRECT_DEBIT_BRI',
                    'EMONEY_SHOPEEPAY',
                    'EMONEY_OVO',
                    'EMONEY_DANA',
                    'QRIS',
                    'PEER_TO_PEER_AKULAKU',
                    'PEER_TO_PEER_KREDIVO',
                    'PEER_TO_PEER_INDODANA',
                ],
            ],
            'customer' => [
                'id' => 'JC-01',
                'name' => 'Zolanda',
                'last_name' => 'Anggraeni',
                'phone' => '628121212121',
                'email' => 'zolanda@example.com',
                'address' => 'taman setiabudi',
                'postcode' => '120129',
                'state' => 'Jakarta',
                'city' => 'Jakarta Selatan',
                'country' => 'ID',
            ],
            'shipping_address' => [
                'first_name' => 'Zolanda',
                'last_name' => 'Anggraeni',
                'address' => 'Jalan Teknologi Indonesia No. 25',
                'city' => 'Jakarta',
                'postal_code' => '12960',
                'phone' => '081513114262',
                'country_code' => 'IDN',
            ],
            'billing_address' => [
                'first_name' => 'Zolanda',
                'last_name' => 'Anggraeni',
                'address' => 'Jalan Teknologi Indonesia No. 25',
                'city' => 'Jakarta',
                'postal_code' => '12960',
                'phone' => '081513114262',
                'country_code' => 'IDN',
            ],
            'additional_info' => [
                'allow_tenor' => [0, 3, 6, 12],
                'close_redirect' => 'www.doku.com',
                'doku_wallet_notify_url' => 'https://dw-notify.free.beeceptor.com',
            ],
        ];

        // Generate Digest
        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));
        // echo "Digest: " . $digestValue;
        // echo "\r\n\n";

        // Prepare Signature Component
        $componentSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $currentDateTimeUTC . "\n" .
            "Request-Target:" . $targetPath . "\n" .
            "Digest:" . $digestValue;
        // echo "Component Signature: \n" . $componentSignature;
        // echo "\r\n\n";

        // Calculate HMAC-SHA256 base64 from all the components above
        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
        // echo "Signature: " . $signature;
        // echo "\r\n\n";

        // Sample of Usage
        $headerSignature =  "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $currentDateTimeUTC . "\n" .
            // Prepend encoded result with algorithm info HMACSHA256=
            "Signature:" . "HMACSHA256=" . $signature;
        // echo "your header request look like: \n".$headerSignature;
        // echo "\r\n\n";

        // $response = Http::post($baseUrl.$targetPath, [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'Client-Id' => $clientId,
        //         'Request-Id' => $requestId,
        //         'Request-Timestamp' => $currentDateTimeUTC,
        //         'Signature' => $headerSignature
        //     ],
        //     'json' => $requestBody
        // ]);

        $headers = [
           'Content-Type' => 'application/json',
            'Client-Id' => $clientId,
            'Request-Id' => $requestId,
            'Request-Timestamp' => $currentDateTimeUTC,
            'Signature' => "HMACSHA256=" . $signature
        ];

        // $body = [
        //     $requestBody

        // ];

        $response = Http::withHeaders($headers)->post($baseUrl.$targetPath,  $requestBody);

        return $response;
    }
}
