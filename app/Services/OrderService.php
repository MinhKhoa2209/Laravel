<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function placeOrder($userId, $data)
    {
        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $userId,
                'total_amount' => $data['total_amount'],
                'status' => 'processing',
                'check_time' => $data['check_time'] ?? null,
                'check_date' => $data['check_date'] ?? null,
                'order_note' => $data['order_note'] ?? null,
            ]);

            $cartItems = Cart::where('user_id', $userId)->get();
            foreach ($cartItems as $item) {
                Order_item::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'sub_amount' => $item->sub_amount,
                ]);
            }

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $data['payment_method'],
                'payment_status' => 'pending',
            ]);

            Cart::where('user_id', $userId)->delete();
            DB::commit();

            return $order;

        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('Failed to place order: ' . $e->getMessage());
        }
    }

    public function getOrderConfirmation($userId)
    {
        return Order::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getOrderDetail($userId, $orderId)
    {
        $order = Order::where('id', $orderId)->where('user_id', $userId)->with('orderItems.product')->firstOrFail();
        $payment = Payment::where('order_id', $orderId)->first();
        $user = User::findOrFail($userId);
        return ['order' => $order,'payment' => $payment,'user' => $user,
        ];
    }

    public function showFeedback()
    {
        $reviews = Order::whereIn('id', [1, 3, 30, 54])
        ->whereNotNull('feedback')
        ->with(['user'])
        ->select('feedback', 'user_id', 'created_at')
        ->get();
        return $reviews->map(function($order) {
            return [
                'feedback' => $order->feedback,
                'author' => $order->user ? $order->user->name : 'Unknown',
                'date' => $order->created_at->format('F d, Y'),
                'rating' => 5,
            ];
        })->toArray();
    }


}
