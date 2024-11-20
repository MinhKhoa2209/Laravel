@extends('admin_panel.layouts.app')
@section('title', 'Payment List')
@section('contents')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @if($payments->count() > 0)
                @foreach($payments as $payment)
                    <tr>
                        <td class="align-middle">{{ $payment->id }}</td>
                        <td class="align-middle">{{ $payment->order_id }}</td>
                        <td class="align-middle">{{ $payment->payment_method }}</td>
                        <td class="align-middle">
                            <!-- Form for updating payment status -->
                            <form action="{{ route('payments.update', $payment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="payment_status" class="form-select rounded" onchange="this.form.submit()">
                                    <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $payment->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="failed" {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="4">Payment is not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
