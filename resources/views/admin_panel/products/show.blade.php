@extends('admin_panel.layouts.app')
@section('title', 'Detail Product')
@section('contents')
    <hr />
   <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ number_format($product->price, 2, '.', ',') }} VND " readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $product->description }}</textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}" readonly>
        </div>
    </div>
    <div class = "row">
        <div class="col mb-3">
            <label class="form-label">Image</label></br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 150px; height: auto;">
    </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="btn-group" role="group" >
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning rounded-start">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-end" style="border-radius: 0 0.375rem 0.375rem 0;">Delete</button>
                </form>
            </div>
        </div>
    </div>


@endsection
