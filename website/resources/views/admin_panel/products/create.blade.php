@extends('admin_panel.layouts.app')
@section('title', 'Create Product')
@section('contents')
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="number" name="price" class="form-control" placeholder="Price" >
                @error('price')
                    <div class="text-danger">{{ $errors->first('price') }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
                <div class="col">
                    <input type="file" name="image" class="form-control" accept="image/*" >
                    @error('image')
                        <div class="text-danger">{{ $errors->first('image') }}</div>
                    @enderror
                </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" ></textarea>
                @error('description')
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" name="quantity" class="form-control" placeholder="Quantity" >
                @error('quantity')
                    <div class="text-danger">{{ $errors->first('quantity') }}</div>
                @enderror
            </div>
            <div class="col">
                <select name="category_id" class="form-control" >
                    <option value="">Select Category</option>
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
