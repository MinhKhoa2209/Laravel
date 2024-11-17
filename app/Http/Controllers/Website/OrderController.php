<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'check_time' => 'nullable|string',
            'check_date' => 'nullable|date',
            'order_note' => 'nullable|string|max:500',
            'payment_method' => 'required|string|in:COD,bank_transfer,mobile_payment',
            'total_amount' => 'required|numeric|min:0',
        ]);

        try {
            $userId = auth()->id();
            $order = $this->orderService->placeOrder($userId, $request->all());
            foreach ($order->orderItems as $item) {
                $item->product->decrement('quantity', $item->quantity);
            }

            if ($request->payment_method === 'COD') {
                return redirect()->route('orders.order_confirmation')->with('success', 'Đặt hàng thành công!');
            } elseif ($request->payment_method === 'bank_transfer') {
                $vnp_TmnCode = "NW99GKNJ";
                $vnp_HashSecret = "L0QXHO87S1X0TLZRNXUB9EZMI65KV0GY";
                $vnp_Url = $this->generateVNPayUrl($order, $request->total_amount, $vnp_TmnCode, $vnp_HashSecret);
                return redirect()->away($vnp_Url);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Đặt hàng thất bại. Vui lòng thử lại. ' . $e->getMessage()]);
        }
    }

    public function paymentCallback(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        if ($vnp_ResponseCode === '00') {
            return redirect()->route('orders.order_confirmation')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('orders.order_confirmation')->with('error', 'Thanh toán không thành công. Vui lòng thử lại.');
        }
    }


    private function generateVNPayUrl($order, $totalAmount, $vnp_TmnCode, $vnp_HashSecret)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('orders.order_confirmation');
        $vnp_TxnRef = $order->id;
        $vnp_OrderInfo = 'Thanh toán đơn hàng #' . $order->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);

        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . rtrim($query, '&');
        if (!empty($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', ltrim($hashdata, '&'), $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;
    }



    public function orderConfirmation(Request $request)
    {
        $order = $this->orderService->getOrderConfirmation(auth()->id());

        if (!$order) {
            return redirect()->route('pages.cart')->withErrors('Order is not found.');
        }
        return view('website.pages.order_confirmation', compact('order'));
    }

    public function orderDetail($orderId)
    {
        $userId = auth()->id();
        $orderDetails = $this->orderService->getOrderDetail($userId, $orderId);
        $user = $orderDetails['user'];
        $order = $orderDetails['order'];
        $payment = $orderDetails['payment'];
        return view('website.pages.order_detail', compact('user', 'order', 'payment'));
    }

}
