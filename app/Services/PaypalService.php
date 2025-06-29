<?php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalService
{
    protected $client;

    public function __construct()
    {
        $env = config('paypal.settings.mode') === 'live'
            ? new ProductionEnvironment(config('paypal.client_id'), config('paypal.secret'))
            : new SandboxEnvironment(config('paypal.client_id'), config('paypal.secret'));

        $this->client = new PayPalHttpClient($env);
    }

    public function createOrder($amount, $currency = 'EUR')
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => $currency,
                    'value' => number_format($amount, 2, '.', ''),
                ]
            ]],
            'application_context' => [
                'cancel_url' => url('/api/paypal/cancel'),
                'return_url' => url('/api/paypal/success'),
            ]
        ];

        $response = $this->client->execute($request);
        dd($this->client);
        return $response->result;
    }

    public function captureOrder($orderId)
    {
        $request = new OrdersCaptureRequest($orderId);
        $request->prefer('return=representation');
        return $this->client->execute($request);
    }
}
