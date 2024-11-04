@extends('admin_panel.layouts.app')
@section('title', 'Category')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add category</a>
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
                <th>Category ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($category->count() > 0)
                @foreach($category as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->id }} </td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">
                            <img src="{{ Storage::url($rs->image) }}" alt="{{ $rs->name }}"
                                style="width: 50px; height: auto;">
                        </td>
                        <td class="align-middle">
                            <div class="btn-group d-flex" role="group" aria-label="Basic example" style="max-width: 250px;">
                                <a href="{{ route('categories.show', $rs->id) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('categories.edit', $rs->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="3">Categories not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
