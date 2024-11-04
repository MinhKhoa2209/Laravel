<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'ASC')->get();

        return view('admin_panel.payments.index', compact('payments'));
    }
    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);
        $request->validate([
            'payment_status' => 'required|in:pending,completed,failed',
        ]);
        $payment->update($request->only('payment_status'));

        return redirect()->route('payments')->with('success', 'Payment updated successfully');
    }
}
