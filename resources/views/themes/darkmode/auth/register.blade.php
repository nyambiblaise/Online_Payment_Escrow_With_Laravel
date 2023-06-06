@extends($theme.'layouts.app')
@section('title',trans('Sign Up'))


@section('content')

    @include($theme.'partials.banner')


    <!--===Account Section===-->
    <section class="account-section bg_img"
             data-background="{{getFile(config('location.logo.path').'background_image.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7">
                    <div class="account-wrapper">
                        <h6 class="account-subtitle">@lang("Create an account and enjoy <a href='".url('/')."' class='text--base'>".$basic->site_title."</a>")</h6>

                        <form action="{{ route('register') }}" method="post" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="account-form-area">

                                @if(session()->get('sponsor') != null)
                                    <div class="input--group">
                                        <label for="sponsor" class="form-label">@lang('Sponsor Name')</label>
                                        <div class="group--input">
                                            <input type="text" id="sponsor" name="sponsor"
                                                   value="{{session()->get('sponsor')}}"
                                                   placeholder="{{trans('Sponsor By') }}" readonly>
                                            @error('username')<span
                                                class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                        </div>
                                    </div>
                                @endif


                                <div class="input--group">
                                    <label for="firstname" class="form-label">@lang('First Name')</label>
                                    <div class="group--input">
                                        <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}">
                                        @error('firstname')<span
                                            class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>

                                <div class="input--group">
                                    <label for="lastname" class="form-label">@lang('Last Name')</label>
                                    <div class="group--input">
                                        <input type="text" id="lastname" name="lastname" value="{{old('lastname')}}">
                                        @error('lastname')<span
                                            class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>

                                <div class="input--group">
                                    <label for="email" class="form-label">@lang('Email Address')</label>
                                    <div class="group--input">
                                        <input type="text" id="email" name="email" value="{{old('email')}}">
                                        @error('email')<span
                                            class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>

                                <div class="input--group">
                                    <label for="email" class="form-label">@lang('Phone Number')</label>
                                    <div class="group--input">
                                        <input type="text" name="phone"
                                               value="{{old('phone')}}">
                                        @error('phone')<span
                                            class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>

                                </div>


                                <div class="input--group">
                                    <label for="username" class="form-label">@lang('Username')</label>
                                    <div class="group--input">
                                        <input type="text" id="username" name="username" value="{{old('username')}}">
                                        @error('username')<span
                                            class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>


                                <div class="input--group">
                                    <label for="password" class="form-label">@lang('Password')</label>
                                    <div class="group--input">
                                        <input type="password" id="password" name="password"
                                               value="{{old('password')}}">
                                        @error('password')<span
                                            class="text-danger mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>

                                <div class="input--group">
                                    <label for="password_confirmation"
                                           class="form-label">@lang('Confirm Password')</label>
                                    <div class="group--input">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                               value="{{old('password_confirmation')}}">
                                    </div>
                                </div>

                                @if(config('basic.google_captcha') == 1)
                                    <div class="input--group ">
                                        <label for="rcaptcha" class="form-label">&nbsp;</label>
                                        <div>
                                            <div class="g-recaptcha ms-3" id="rcaptcha"
                                                 data-sitekey="{{config('basic.google_captcha_key')}}"></div>
                                            <span id="captcha" class="text-danger ms-3"></span>
                                        </div>
                                    </div>
                                @endif


                            </div>
                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center m--5px-none mt-3 fs-14">
                                <div class="m--5px">
                                    @lang("Already have an account?") <a href="{{ route('login') }}"
                                                                         class="text--base ms-2">@lang('Sign In')</a>
                                </div>
                                <div class="btn-group m-0">
                                    <button type="submit" class="cmn-btn">@lang('Sign Up')</button>
                                </div>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===Account Section===-->
@endsection


@push('style')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@push('script')


    <script>
        "use strict";

        function submitUserForm() {

            var isCapcha = "{{config('basic.google_captcha')}}"
            if (isCapcha == '0') {
                return true
            }

            var v = grecaptcha.getResponse();
            if (v.length == 0) {
                document.getElementById('captcha').innerHTML = "{{trans('Captcha field is required.')}}";
                document.getElementById('captcha').classList.remove("text-info");
                document.getElementById('captcha').classList.add("text-danger");
                return false;
            } else {
                document.getElementById('captcha').innerHTML = "{{trans('Captcha completed')}}";
                document.getElementById('captcha').classList.remove("text-danger");
                document.getElementById('captcha').classList.add("text-info");
                return true;
            }

        }

    </script>
@endpush
