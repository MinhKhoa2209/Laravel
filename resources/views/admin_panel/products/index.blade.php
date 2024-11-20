@extends('admin_panel.layouts.app')

@section('title', 'Product List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Product_ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($products->count() > 0)
                @foreach ($products as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">
                            <img src="{{ Storage::url($rs->image) }}" alt="{{ $rs->name }}"
                                style="width: 50px; height: auto;">
                        </td>
                        <td class="align-middle">{{ number_format($rs->price, 2, '.', ',') }} VND</td>
                        <td class="align-middle">{{ $rs->quantity }}</td>
                        <td class="align-middle">{{ $rs->category->name ?? 'N/A' }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group d-flex" role="group" aria-label="Basic example" style="max-width:270px">
                                <a href="{{ route('products.show', $rs->id) }}" type="button" class="btn btn-secondary"
                                    style="width: 68px">Detail</a>
                                <a href="{{ route('products.edit', $rs->id) }}" type="button" class="btn btn-warning"
                                    style="width: 60px">Edit</a>
                                <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type = "button"  class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; width: 68px">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="8">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
