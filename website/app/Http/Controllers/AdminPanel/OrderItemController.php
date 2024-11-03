<?php
namespace App\Http\Controllers\AdminPanel;

use App\Models\Order;
use App\Http\Controllers\Controller;
class OrderItemController extends Controller
{
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order_item = $order->orderItems;
        return view('admin_panel.orders.show_items', compact('order_item'));
    }
}

