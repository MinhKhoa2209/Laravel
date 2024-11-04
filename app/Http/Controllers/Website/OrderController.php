<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {

    public function placeOrder(Request $request)
    {
        $request->validate([
            'check_time' => 'nullable|string',
            'check_date' => 'nullable|date',
            'order_note' => 'nullable|string|max:500',
            'payment_method' => 'required|string|in:COD,bank_transfer,mobile_payment',
            'total_amount' => 'required|numeric|min:0',
        ]);
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $request->input('total_amount'),
                'status' => 'pending',
                'check_time' => $request->input('check_time') ?? null,
                'check_date' => $request->input('check_date') ?? null,
                'order_note' => $request->input('order_note') ?? null,
            ]);
            $cartItems = Cart::where('user_id', auth()->id())->get();
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
                'payment_method' => $request->input('payment_method'),
                'payment_status' => 'pending',
            ]);

            Cart::where('user_id', auth()->id())->delete();
            DB::commit();

            return redirect()->route('orders.order_confirmation')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to place order. Please try again. ' . $e->getMessage()]);
        }
    }

    public function orderConfirmation(Request $request)
    {
        $order = Order::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$order) {
            return redirect()->route('pages.cart')->withErrors('Order is not found.');
        }
        return view('website.pages.order_confirmation', compact('order'));
    }

    public function orderDetail($orderId)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $order = Order::where('id', $orderId)
        ->where('user_id', $userId)
        ->with('orderItems.product')
        ->firstOrFail();
        $payment = Payment::where('order_id', $orderId)->first();
        return view('website.pages.order_detail', compact('user', 'order', 'payment'));
    }

}



