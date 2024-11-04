<?php
namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
    public function index()
    {
        $currentMonth = now()->month;
        $monthlyEarnings = Order::whereMonth('created_at', $currentMonth)
            ->sum('total_amount');
        $revenueData = array_fill(0, 12, 0);

        // Lấy dữ liệu doanh thu theo tháng
        $orders = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Cập nhật dữ liệu doanh thu vào đúng tháng
        foreach ($orders as $order) {
            $revenueData[$order->month - 1] = $order->total;
        }
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return view('admin_panel.layouts.dashboard', compact('monthlyEarnings', 'revenueData', 'labels'));
    }
}
