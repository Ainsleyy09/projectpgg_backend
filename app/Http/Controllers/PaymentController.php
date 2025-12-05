<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\MidtransService;

class PaymentController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function index()
    {
        $payments = Payment::with('registration')->latest()->get();

        return response()->json([
            "success" => true,
            "message" => "All Payments",
            "data" => $payments
        ]);
    }

    public function show($id)
    {
        $payment = Payment::with('registration')->find($id);

        if (!$payment) {
            return response()->json([
                "success" => false,
                "message" => "Payment Not Found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Payment Detail",
            "data" => $payment
        ]);
    }

    public function createSnapToken(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;

        $request->validate([
            'registration_id' => 'required',
            'amount' => 'required|numeric',
            'name' => 'required',
            'email' => 'required',
        ]);

        // Generate Order ID
        $orderId = 'ORDER-' . time() . '-' . rand(1000, 9999);

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int)$request->amount,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone ?? null,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($payload);

        // Save Payment (Pending)
        Payment::create([
            'registration_id' => $request->registration_id,
            'order_id' => $orderId,
            'amount' => $request->amount,
            'payment_method' => 'midtrans',
            'status' => 'pending',
            'transaction_id' => null,
            'payment_date' => null,
        ]);

        return response()->json([
            'order_id' => $orderId,
            'token' => $snap->token,
            'redirect_url' => $snap->redirect_url
        ]);
    }

    public function callback(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $order_id = $notif->order_id;
        $transaction = $notif->transaction_status;

        $payment = Payment::where('order_id', $order_id)->first();

        if (!$payment) {
            return response()->json(["message" => "Payment not found"], 404);
        }

        // SIMPAN TRANSACTION ID
        $payment->transaction_id = $notif->transaction_id;

        if (in_array($transaction, ['capture', 'settlement'])) {
            $payment->status = 'success';
            $payment->payment_date = now();
        } elseif ($transaction == 'pending') {
            $payment->status = 'pending';
        } else {
            $payment->status = 'failed';
        }

        $payment->save();

        return response()->json(["message" => "Callback received"]);
    }
}
