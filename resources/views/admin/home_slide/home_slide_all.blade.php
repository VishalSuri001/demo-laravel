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
                                method="POST" action="{{ route('update.slider') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeSlide->title }}"
                                            placeholder="Title" id="title" name="title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeSlide->short_title }}"
                                            placeholder="Short Title" id="short_title" name="short_title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="videourl" class="col-sm-2 col-form-label">Video Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeSlide->video_url }}"
                                            placeholder="Video Url" id="videourl" name="videourl">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="slide">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="show-profile-img" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage"
                                            class="rounded avatar-lg"
                                            src="{{ (!empty($homeSlide->slide))
                                                ? url('upload/home_slide/'.$homeSlide->slide)
                                                : url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <hr />
                                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Update
                                    Slide</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
