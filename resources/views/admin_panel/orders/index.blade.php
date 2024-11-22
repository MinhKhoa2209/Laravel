@extends('admin_panel.layouts.app')
@section('title', 'Order List')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Check time</th>
                <th>Check date</th>
                <th>Order note</th>
                <th>Feedback</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($order->count() > 0)
                @foreach($order as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->id }}</td>
                        <td class="align-middle">{{ $rs->user_id }}</td>
                        <td class="align-middle">{{ number_format($rs->total_amount, 2, '.', ',') }} VND</td>
                        <td class="align-middle">
                            <form action="{{ route('orders.update', $rs->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select rounded" onchange="this.form.submit()">
                                    <option value="pending" {{ $rs->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="shipping" {{ $rs->status == 'shipping' ? 'selected' : '' }}>Shipping</option>
                                    <option value="delivered" {{ $rs->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="canceled" {{ $rs->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </form>
                        </td>
                        <td class="align-middle">{{ $rs->check_time }}</td>
                        <td class="align-middle">{{ $rs->check_date }}</td>
                        <td class="align-middle">{{ $rs->order_note }}</td>
                        <td class="align-middle">{{ $rs->feedback }}</td>
                        <td class="align-middle">
                            <div class="btn-group d-flex" role="group" aria-label="Basic example" style="max-width: 150px;">
                                <a href="{{ route('orders.show', $rs->id) }}" class="btn btn-secondary">Detail</a>
                                <form action="{{ route('orders.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-0" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; width: 75px">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Order is not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
