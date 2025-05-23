<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PaymentService;
use App\Models\Cart;

class PaymentController extends Controller
{

    private $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function payment($id)
    {
        $cart = Cart::findOrFail($id);
        $user = $cart->user;
        // dd($cart->total);
        $data = [
            'CustomerName' => $user->name,
            'NotificationOption' => 'LNK',
            'InvoiceValue' => $cart->total,
            'CustomerEmail' => $user->email,
            'CallBackUrl' => route('callBackUrl'),
            'ErrorUrl' => route('errorUrl'),
            'Language' => app()->getLocale(),
            'DisplayCurrencyIso' => 'SAR',
        ];


        $response =  $this->paymentService->sendPayment($data);
        return redirect($response['Data']['InvoiceURL']);
    }

    public function getPaymentStatus(Request $request)
    {
        return $request;
        $data = [];
        $data['key'] = $request->paymentId;
        $data['key-type'] = 'paymentId';


        return $this->paymentService->getPaymentStatus($data);
    }


    public function callBackUrl(Request $request)
    {
        // return $request;
        $data = [];
        $data['key'] = $request->paymentId;
        $data['keyType'] = 'paymentId';


        return $this->paymentService->getPaymentStatus($data);
    }

    public function errorUrl(Request $request)
    {
        return $request;
    }
}
