@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <br/>
                        <center>
                        <img class="rounded-circle avatar-xl" src="{{ asset('backend/') }}/assets/images/small/img-5.jpg" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name {{ $userData->name }}</h4>
                            <hr/>
                            <h4 class="card-title">Email {{ $userData->email }}</h4>
                            <hr/>
                            <h4 class="card-title">Username {{ $userData->username }}</h4>
                            <hr/>
                            <a
                                href="{{ route('admin.edit_profile') }}"
                                class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
