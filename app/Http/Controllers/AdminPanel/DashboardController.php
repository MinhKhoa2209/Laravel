<?php
namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class DashboardController extends Controller {
    public function index()
    {
        $currentMonth = now()->month;
        $monthlyEarnings = Payment::with('order')->where('payment_status', 'completed')
        ->whereMonth('created_at', $currentMonth)->get()->sum(function ($payment) {
            return $payment->order ? $payment->order->total_amount : 0;
        });
        $revenueData = array_fill(0, 12, 0);
        $payments = Payment::with('order')
            ->where('payment_status', 'completed')
            ->get()
            ->groupBy(function ($payment) {
                return $payment->created_at->month;
            });
        foreach ($payments as $month => $monthlyPayments) {
            $revenueData[$month - 1] = $monthlyPayments->sum(function ($payment) {
                return $payment->order ? $payment->order->total_amount : 0;
            });
        }
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return view('admin_panel.layouts.dashboard', compact('monthlyEarnings', 'revenueData', 'labels'));
    }
}
