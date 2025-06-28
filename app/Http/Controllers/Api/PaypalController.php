<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PayPalService;
use Illuminate\Http\Request;

class PayPalController extends Controller {
    public function createOrder(Request $request) {
        $paypal = new PayPalService();
        $order = $paypal->createOrder($request->amount);
        return response()->json($order);
    }

    public function captureOrder(Request $request) {
        $paypal = new PayPalService();
        $result = $paypal->captureOrder($request->orderId);
        return response()->json($result);
    }
}
