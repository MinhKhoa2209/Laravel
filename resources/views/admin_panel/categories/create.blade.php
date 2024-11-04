@extends('admin_panel.layouts.app')

@section('title', 'Create category')

@section('contents')
    <hr />
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </form>
@endsection
