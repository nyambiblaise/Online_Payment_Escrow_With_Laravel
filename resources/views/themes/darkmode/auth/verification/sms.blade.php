@extends($theme.'layouts.app')
@section('title',trans($page_title))

@section('content')
    @include($theme.'partials.banner')

    <section class="account-section bg_img " data-background="{{getFile(config('location.logo.path').'background_image.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7">
                    <div class="account-wrapper">
                        <h4 class="account-title">@lang($page_title)</h4>

                        <form action="{{route('user.smsVerify')}}"  method="post">
                            @csrf
                            <div class="account-form-area">
                                <div class="input--group">
                                    <label for="code" class="form-label">@lang('Enter Code')</label>
                                    <div class="group--input">
                                        <input type="text" id="code"  name="code" value="{{old('code')}}">
                                        @error('code')<span class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                        @error('error')<span class="text-danger  mt-1">{{ trans($message) }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center m--5px-none mt-3 fs-14">
                                <div class="m--5px">
                                    @lang("Didn\'t get Code? Click to") <a href="{{route('user.resendCode')}}?type=mobile" class="text--base ms-2">@lang('Resend code')</a>
                                    @error('resend')
                                    <p class="text-danger  mt-1">{{ trans($message) }}</p>
                                    @enderror
                                </div>
                                <div class="btn-group m-0">
                                    <button type="submit" class="cmn-btn">@lang('Submit')</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
