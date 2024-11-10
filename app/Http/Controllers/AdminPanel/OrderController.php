<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $order = Order::orderBy('created_at', 'ASC')->get();

        return view('admin_panel/orders.index', compact('order'));
    }

    /**
     * Display the specified order.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $order_item = $order->orderItems;

        return view('admin_panel.orders.show', compact('order', 'order_item'));
    }

    /**
     * Update the specified order.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $oldStatus = $order->status;
        $order->update($request->only('status'));
        if ($order->status === 'canceled' && $oldStatus !== 'canceled') {
            foreach ($order->orderItems as $item) {
                $item->product->increment('quantity', $item->quantity);
            }
        }

        return redirect()->route('orders')->with('success', 'Order updated successfully');
    }


    /**
     * Remove the specified order from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders')->with('success', 'Order deleted successfully');
    }
}
