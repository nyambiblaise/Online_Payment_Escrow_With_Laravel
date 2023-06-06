@extends('admin.layouts.app')

@section('title')
    @lang('Banner & Background Image')
@endsection


@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">


                        <form action="{{ route('admin.breadcrumbUpdate')}}" method="post"
                              enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">

                                        <h5 class="text-dark">{{trans('Breadcrumb Image')}}</h5>
                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i
                                                    class="fas fa-upload"></i></label>
                                            <input type="file" name="banner" placeholder="@lang('Choose image')"
                                                   id="image">
                                            <img id="image_preview_container" class="preview-image"
                                                 src="{{getFile(config('location.logo.path').'banner.jpg') ? : 0}}"
                                                 alt="preview image">
                                        </div>
                                        @error('banner')
                                        <span class="text-danger">{{trans($message)}}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <h5 class="text-dark">{{trans('Login Background Image')}}</h5>
                                        <div class="image-input ">
                                            <label for="image-upload" id="image-label"><i
                                                    class="fas fa-upload"></i></label>
                                            <input type="file" name="background_image" placeholder="@lang('Choose image')"
                                                   id="favicon">
                                            <img id="favicon_preview_container" class="preview-image"
                                                 src="{{getFile(config('location.logo.path').'background_image.jpg') ? : 0}}"
                                                 alt="preview image">
                                        </div>
                                        @error('favicon')
                                        <span class="text-danger">{{trans($message)}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="submit-btn-wrapper text-center mt-4">
                                        <button type="submit"
                                                class="btn waves-effect waves-light btn-primary btn-block btn-rounded">
                                            <span>@lang('Save Changes')</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection

@push('js')
    <script>
        $(document).ready(function (e) {
            "use strict";

            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#favicon').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#favicon_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
    </script>
@endpush
