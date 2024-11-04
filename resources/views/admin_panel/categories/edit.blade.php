@extends('admin_panel.layouts.app')
@section('title', 'Edit Category')
@section('contents')
    <hr />
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col" style="display: flex; flex-direction: column;">
                <label class="form-label">Current Image:</label>
                @if($category->image)
                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: auto; margin-bottom: 10px;">
                @else
                    <p>Image not found</p>
                @endif

                <label class="form-label">New Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" style="width: 30%">
            </div>
        </div>

        <div class="row mb-3">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
