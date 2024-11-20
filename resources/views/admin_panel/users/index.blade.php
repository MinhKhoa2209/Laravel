@extends('admin_panel.layouts.app')

@section('title', 'Home Customer')

@section('contents')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Locked</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($user->count() > 0)
                @foreach($user as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->phone }}</td>
                        <td class="align-middle">{{ $rs->address }}</td>
                        <td class="align-middle">{{$rs->locked}} </td>
                        <td class="align-middle">
                            <div class="btn-group d-flex" role="group" aria-label="Basic example" style="max-width: 200px;">
                                <form action="{{ route('users.lock', $rs->id) }}" method="POST" onsubmit="return confirm('Lock this user?')" style="margin: 0;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary" style="border-radius: 5px 0 0 5px; margin-right: -1px;">Lock</button>
                                </form>
                                <form action="{{ route('users.unlock', $rs->id) }}" method="POST" onsubmit="return confirm('Unlock this user?')" style="margin: 0;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning" style="border-radius: 0 5px 5px 0;">Unlock</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Customer not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
