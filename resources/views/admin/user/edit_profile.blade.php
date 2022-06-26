@extends('admin.admin_master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <br />
                        <center>
                            <h4>Update {{ $userData->name }}</h4>
                        </center>
                        <div class="card-body">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form class="form-horizontal mt-3"
                                enctype="multipart/form-data"
                                method="POST" action="{{ route('admin.edit_profile') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $userData->name }}"
                                            placeholder="Name" id="name" name="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $userData->email }}"
                                            placeholder="Email" id="email" name="email">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $userData->username }}"
                                            placeholder="Username" id="username" name="username">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="profile_image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="show-profile-img" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="show-profile-img" class="rounded avatar-lg"
                                            src="{{ asset('backend/assets/images/small/img-5.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <hr />
                                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Update
                                    Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-profile-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
