@extends('admin_panel.layouts.app')
@section('title', 'Edit Product')
@section('contents')
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}"
                    required>
            </div>
            <div class="col">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}"
                    required>
            </div>
        </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            <div class="col">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Quantity"
                    value="{{ $product->quantity }}" required>
            </div>
        </div>
        <div class = "row mb-3">
                <div class="col">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required>{{ $product->description }}</textarea>
                </div>
        </div>
        <div class="row mb-3">
            <div class="col" style="display: flex; flex-direction: column;">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" style="width: 30%">
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                        style="width: 150px; height: auto; margin: 16px 0 16px 0; border-radius: 8px; border: 1px solid #ccc">
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
