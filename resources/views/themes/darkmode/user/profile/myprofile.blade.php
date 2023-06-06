@extends($theme.'layouts.user')
@section('title',trans('Profile Settings'))

@section('content')

    @include($theme.'partials.banner')


    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">

            <div class="row">
                <div class="col-sm-4">
                    <div class="card secbg ">
                        <div class="card-body">
                            <form method="post" action="{{ route('user.updateProfile') }}"
                                  enctype="multipart/form-data">
                                <div class="input--group">
                                    @csrf
                                    <div class="image-input ">
                                        <label for="image-upload" id="image-label"><i
                                                class="fas fa-upload"></i></label>
                                        <input type="file" name="image" placeholder="@lang('Choose image')" id="image">
                                        <img id="image_preview_container" class="preview-image max-width-200"
                                             src="{{getFile(config('location.user.path').$user->image)}}"
                                             alt="preview image">
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{trans($message)}}</span>
                                    @enderror

                                </div>
                                <div class="input--group">
                                    <p>@lang('Joined At') @lang($user->created_at->format('d M, Y g:i A'))</p>
                                </div>
                                <div class="input--group text-center text-md-left">
                                    <button type="submit" class="cmn-btn w-100">
                                        <span>@lang('Image Update')</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card secbg">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link   {{ $errors->has('profile') ? 'active' : ($errors->has('password') ? '' : 'active') }}"
                                       data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                       aria-controls="home" aria-selected="true">@lang('Profile Information')</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $errors->has('password') ? 'active' : '' }}"
                                       data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab"
                                       aria-controls="password" aria-selected="false">@lang('Password Setting')</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content " id="myTabContent">
                                <div id="home"
                                     role="tabpanel" aria-labelledby="home-tab"
                                     class="tab-pane fade  {{ $errors->has('profile') ? 'show active' : ($errors->has('password') ? '' : 'show active') }}">
                                    <form action="{{ route('user.updateInformation')}}" method="post">
                                        @method('put')
                                        @csrf

                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('First Name')</label>
                                                    <input class="form-control" type="text" name="firstname"
                                                           value="{{old('firstname')?? $user->firstname }}">
                                                    @if($errors->has('firstname'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('firstname')) </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('Last Name')</label>
                                                    <input class="form-control" type="text" name="lastname"
                                                           value="{{old('lastname')??$user->lastname }}">
                                                    @if($errors->has('lastname'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('lastname')) </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('Username')</label>
                                                    <input class="form-control" type="text" name="username"
                                                           value="{{old('username')?? $user->username }}">
                                                    @if($errors->has('username'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('username')) </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('Email Address')</label>
                                                    <input class="form-control" type="email"
                                                           value="{{ $user->email }}" readonly>
                                                    @if($errors->has('email'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('email')) </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('Phone Number')</label>
                                                    <input class="form-control" type="text" readonly
                                                           value="{{$user->phone}}">

                                                    @if($errors->has('phone'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('phone')) </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input--group mt-2">
                                                    <label>@lang('Preferred language')</label>
                                                    <select name="language_id" id="language_id" class="form-control">
                                                        <option value="" disabled>@lang('Select Language')</option>
                                                        @foreach($languages as $la)
                                                            <option value="{{$la->id}}"

                                                                {{ old('language_id', $user->language_id) == $la->id ? 'selected' : '' }}>@lang($la->name)</option>
                                                        @endforeach
                                                    </select>

                                                    @if($errors->has('language_id'))
                                                        <span
                                                            class="error text-danger">@lang($errors->first('language_id')) </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input--group mt-2">
                                            <label>@lang('Address')</label>
                                            <textarea class="form-control" name="address"
                                                      rows="5">{{old('address',$user->address)}}</textarea>
                                            @if($errors->has('address'))
                                                <span class="error text-danger">@lang($errors->first('address')) </span>
                                            @endif
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="cmn-btn w-100">
                                                @lang('Update User')</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="password"
                                     role="tabpanel" aria-labelledby="password-tab"
                                     class="tab-pane fade {{ $errors->has('password') ? 'show active' : '' }}   ">

                                    <form method="post" action="{{ route('user.updatePassword') }}">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label>@lang('Current Password')</label>
                                            <input id="password" type="password" class="form-control"
                                                   name="current_password" autocomplete="off">
                                            @if($errors->has('current_password'))
                                                <span
                                                    class="error text-danger">@lang($errors->first('current_password')) </span>
                                            @endif
                                        </div>
                                        <div class="input--group mt-4">
                                            <label>@lang('New Password')</label>
                                            <input id="password" type="password" class="form-control"
                                                   name="password" autocomplete="off">
                                            @if($errors->has('password'))
                                                <span
                                                    class="error text-danger">@lang($errors->first('password')) </span>
                                            @endif
                                        </div>

                                        <div class="input--group ">
                                            <label>@lang('Confirm Password')</label>
                                            <input id="password_confirmation" type="password"
                                                   name="password_confirmation" autocomplete="off"
                                                   class="form-control">
                                            @if($errors->has('password_confirmation'))
                                                <span
                                                    class="error text-danger">@lang($errors->first('password_confirmation')) </span>
                                            @endif
                                        </div>

                                        <div class="input--group">
                                            <button type="submit"
                                                    class=" cmn-btn w-100">@lang('Update Password')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
@push('script')
    <script>
        "use strict";
        $(document).on('click', '#image-label', function () {
            $('#image').trigger('click');
        });
        $(document).on('change', '#image', function () {
            var _this = $(this);
            var newimage = new FileReader();
            newimage.readAsDataURL(this.files[0]);
            newimage.onload = function (e) {
                $('#image_preview_container').attr('src', e.target.result);
            }
        });
    </script>
@endpush
