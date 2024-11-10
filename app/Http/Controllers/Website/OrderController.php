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
            $order  = $this->orderService->placeOrder($userId, $request->all());
            foreach ($order->orderItems as $item) {
                $item->product->decrement('quantity', $item->quantity);
            }
            return redirect()->route('orders.order_confirmation')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to place order. Please try again. ' . $e->getMessage()]);
        }
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
