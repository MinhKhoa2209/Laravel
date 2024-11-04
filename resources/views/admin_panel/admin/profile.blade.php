@extends('admin_panel/layouts.app')
@section('title','Profile')
@section('contents')

    @if(session('admin_name'))
        <form method="GET" enctype="multipart/form-data" id="profile_setup_frm" action="" >
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ session('admin_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email"  class="form-control" value="{{session('admin_email')}}" placeholder="Email">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </form>
    @else
        <div class="alert alert-warning">
            You need to login to view profile information.
        </div>
    @endif
@endsection
