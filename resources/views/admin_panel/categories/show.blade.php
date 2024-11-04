@extends('admin_panel.layouts.app')
@section('title', 'Detail Category')
@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $category->created_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $category->updated_at->format('Y-m-d H:i:s') }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
