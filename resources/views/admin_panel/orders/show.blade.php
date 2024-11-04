@extends('admin_panel.layouts.app')
@section('title', 'Order Items')

@section('contents')
    <hr />
    <a href="{{ route('orders') }}" class="btn btn-primary mb-3">Back</a>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Order Item ID</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Sub amount</th>
                    </tr>
                </thead>
                <tbody>
                    @if($order_item->count() > 0)
                        @foreach($order_item as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->product_id }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->sub_amount, 2, '.', ',') }} VND </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No order items found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
