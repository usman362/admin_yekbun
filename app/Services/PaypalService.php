<?php

namespace App\Services;

use GuzzleHttp\Client;

class PayPalService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('paypal.mode') === 'live'
                ? 'https://api-m.paypal.com'
                : 'https://api-m.sandbox.paypal.com',
        ]);
    }

    private function getAccessToken()
    {
        $response = $this->client->post('/v1/oauth2/token', [
            'auth' => [config('paypal.client_id'), config('paypal.secret')],
            'form_params' => ['grant_type' => 'client_credentials'],
        ]);
        return json_decode($response->getBody())->access_token;
    }

    public function createOrder($amount)
    {
        $token = $this->getAccessToken();
        $response = $this->client->post('/v2/checkout/orders', [
            'headers' => ['Authorization' => "Bearer $token", 'Content-Type' => 'application/json'],
            'json' => [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => ['currency_code' => 'USD', 'value' => $amount]
                ]],
            ]
        ]);
        return json_decode($response->getBody());
    }

    public function captureOrder($orderId)
    {
        $token = $this->getAccessToken();
        $response = $this->client->post("/v2/checkout/orders/$orderId/capture", [
            'headers' => ['Authorization' => "Bearer $token"],
        ]);
        return json_decode($response->getBody());
    }
}
