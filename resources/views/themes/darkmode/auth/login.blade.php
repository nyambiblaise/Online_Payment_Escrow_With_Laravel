@extends($theme.'layouts.app')
@section('title',trans('Sign In'))


@section('content')

    @include($theme.'partials.banner')


    <!--===Account Section===-->
    <section class="account-section bg_img " data-background="{{getFile(config('location.logo.path').'background_image.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7">
                    <div class="account-wrapper">
                        <h4 class="account-title">@lang('Login Form')</h4>
                        <h6 class="account-subtitle">@lang("Sign in to <a href='".url('/')."' class='text--base'>".$basic->site_title."</a> with your ".$basic->site_title." ID")</h6>

                        <form action="{{ route('login') }}" method="post" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="account-form-area">
                                <div class="input--group">
                                    <label for="username" class="form-label">@lang('Email Or Username')</label>
                                    <div class="group--input">
                                        <input type="text" id="username" name="username" value="{{old('username')}}">
                                        @error('username')<span class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                        @error('email')<span class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>


                                <div class="input--group">
                                    <label for="password" class="form-label">@lang('Password')</label>
                                    <div class="group--input">
                                        <input type="password" id="password" name="password">
                                        @error('password')<span class="text-danger mt-1">{{ trans($message) }}</span>@enderror
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



                                <div class="input--group">
                                    <label class="form-label d-sm-block d-none">&nbsp;</label>
                                    <div class="group--input d-flex flex-wrap">
                                        <div class="checkgroup">
                                            <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember-me" class="form-label">@lang('Remember Me')</label>
                                        </div>
                                        <a class="text--base"  href="{{ route('password.request') }}">@lang("Forgot password?")</a>
                                    </div>
                                </div>



                            </div>
                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center m--5px-none mt-3 fs-14">
                                <div class="m--5px">
                                    @lang("Don't have any account?") <a href="{{ route('register') }}" class="text--base ms-2">@lang('Sign Up')</a>
                                </div>
                                <div class="btn-group m-0">
                                    <button type="submit" class="cmn-btn">@lang('Sign In')</button>
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

