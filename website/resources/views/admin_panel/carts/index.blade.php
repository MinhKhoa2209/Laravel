@extends('admin_panel.layouts.app')
@section('title', 'Cart List')
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
                <th>User ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Sub Amount</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @if($cart->count() > 0)
                @foreach($cart as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->user_id }}</td>
                        <td class="align-middle">{{ $rs->product_id }}</td>
                        <td class="align-middle">{{ $rs->quantity }}</td>
                        <td class="align-middle">{{ number_format($rs->sub_amount, 2, '.', ',') }} VND</td>
                        <td class="align-middle">{{ number_format($rs->total_amount, 2, '.', ',') }} VND</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No items found in cart</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
