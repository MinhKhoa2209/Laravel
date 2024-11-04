@extends('admin_panel.layouts.app')
@section('title', 'Edit Category')
@section('contents')
    <hr />
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 d-flex align-items-center">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control me-3" placeholder="Name" value="{{ $category->name }}" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </form>
@endsection
