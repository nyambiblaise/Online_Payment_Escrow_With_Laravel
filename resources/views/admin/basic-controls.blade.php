@extends('admin.layouts.app')
@section('title')
    @lang('Basic Controls')
@endsection
@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0">
        <div class="card-body">

            <form method="post" action="" novalidate="novalidate" class="needs-validation base-form">
                @csrf
                <div class="row">
                    <div class="form-group  col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Site Title')</label>
                        <input type="text" name="site_title"
                               value="{{ old('site_title') ?? $control->site_title ?? 'Site Title' }}"
                               class="form-control ">

                        @error('site_title')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror

                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('TimeZone')</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="time_zone">
                            <option hidden>{{ old('time_zone', $control->time_zone)?? 'Select Time Zone' }}</option>
                            @foreach ($control->time_zone_all as $time_zone_local)
                                <option value="{{ $time_zone_local }}">@lang($time_zone_local)</option>
                            @endforeach
                        </select>

                        @error('time_zone')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Base Currency')</label>
                        <input type="text" name="currency" value="{{ old('currency') ?? $control->currency ?? 'USD' }}"
                               required="required" class="form-control ">

                        @error('currency')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Currency Symbol')</label>
                        <input type="text" name="currency_symbol"
                               value="{{ old('currency_symbol') ?? $control->currency_symbol ?? '$' }}"
                               required="required" class="form-control ">

                        @error('currency_symbol')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Fraction number')</label>
                        <input type="text" name="fraction_number"
                               value="{{ old('fraction_number') ?? $control->fraction_number ?? '2' }}"
                               required="required" class="form-control ">
                        @error('fraction_number')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>




                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Minimum Escrow Amount')</label>
                        <div class="input-group mb-3">

                            <input type="text" name="minimum_escrow"
                                   value="{{ old('minimum_escrow') ?? getAmount($control->minimum_escrow) ?? '10' }}"
                                   required="required" class="form-control ">
                            <div class="input-group-append ">
                                <span class="input-group-text bg-secondary text-white">{{$control->currency}}</span>
                            </div>
                        </div>

                        @error('minimum_escrow')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Maximum Escrow Amount')</label>
                        <div class="input-group mb-3">

                            <input type="text" name="maximum_escrow"
                                   value="{{ old('maximum_escrow') ?? getAmount($control->maximum_escrow) ?? '1000' }}"
                                   required="required" class="form-control ">
                            <div class="input-group-append ">
                                <span class="input-group-text bg-secondary text-white">{{$control->currency}}</span>
                            </div>
                        </div>
                        @error('maximum_escrow')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Escrow Charge')</label>
                        <div class="input-group mb-3">
                        <input type="text" name="escrow_charge"
                               value="{{ old('escrow_charge') ?? getAmount($control->escrow_charge) ?? '2' }}"
                               required="required" class="form-control ">
                        <div class="input-group-append ">
                            <span class="input-group-text bg-secondary text-white">{{trans('%')}}</span>
                        </div>
                        </div>

                        @error('escrow_charge')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label>@lang('Paginate Per Page')</label>
                        <input type="text" name="paginate" value="{{ old('paginate') ?? $control->paginate ?? '2' }}"
                               required="required" class="form-control ">
                        @error('paginate')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>



                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                        <label>@lang('Google Captcha key')</label>
                        <input type="text" name="google_captcha_key"
                               value="{{ old('google_captcha_key') ?? $control->google_captcha_key ?? '' }}"
                               required="required" class="form-control ">

                        @error('google_captcha_key')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label>@lang('Google Captcha')</label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='google_captcha'>
                            <input type="checkbox" name="google_captcha" class="custom-switch-checkbox"
                                   id="google_captcha"
                                   value="0" {{($control->google_captcha == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="google_captcha">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>


                    <div class="form-group col-sm-6 col-md-4 col-lg-3 ">
                        <label>@lang('SMS Notification')</label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='sms_notification'>
                            <input type="checkbox" name="sms_notification" class="custom-switch-checkbox"
                                   id="sms_notification"
                                   value="0" {{($control->sms_notification == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="sms_notification">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label class="d-block">@lang('Email Notification')</label>

                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='email_notification'>
                            <input type="checkbox" name="email_notification" class="custom-switch-checkbox"
                                   id="email_notification"
                                   value="0" {{($control->email_notification == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="email_notification">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label class="d-block">@lang('SMS Verification')</label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='sms_verification'>
                            <input type="checkbox" name="sms_verification" class="custom-switch-checkbox"
                                   id="sms_verification"
                                   value="0" {{($control->sms_verification == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="sms_verification">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-md-4 col-lg-3">
                        <label class="d-block">@lang('Email Verification')</label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='email_verification'>
                            <input type="checkbox" name="email_verification" class="custom-switch-checkbox"
                                   id="email_verification"
                                   value="0" {{($control->email_verification == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="email_verification">
                                <span class="custom-switch-checkbox-inner"></span>
                                <span class="custom-switch-checkbox-switch"></span>
                            </label>
                        </div>
                    </div>

                </div>


                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3"><span><i
                            class="fas fa-save pr-2"></i> @lang('Save Changes')</span></button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";
        $(document).ready(function () {
            $('select').select2({
                selectOnClose: true
            });
        });
    </script>
@endpush
