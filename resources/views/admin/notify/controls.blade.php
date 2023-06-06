@extends('admin.layouts.app')
@section('title')
    @lang('Pusher Notification')
@endsection
@section('content')

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0">
        <div class="card-body">
            <form method="post" action="" class="needs-validation base-form">
                @csrf

                <div class="row my-3">

                    <div class="form-group col-sm-4 col-12">
                        <label >@lang('Pusher app ID')</label>
                        <input type="text" name="PUSHER_APP_ID" value="{{ old('PUSHER_APP_ID',env('PUSHER_APP_ID')) }}"
                               required="required" class="form-control ">
                        @error('PUSHER_APP_ID')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-4 col-12">
                        <label >@lang('Pusher app key')</label>
                        <input type="text" name="PUSHER_APP_KEY"
                               value="{{ old('PUSHER_APP_KEY',env('PUSHER_APP_KEY')) }}" required="required"
                               class="form-control ">
                        @error('PUSHER_APP_KEY')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-4 col-12">
                        <label >@lang('Pusher app secret')</label>
                        <input type="text" name="PUSHER_APP_SECRET"
                               value="{{ old('PUSHER_APP_SECRET',env('PUSHER_APP_SECRET')) }}" required="required"
                               class="form-control ">
                        @error('PUSHER_APP_SECRET')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-sm-4 col-12">
                        <label >@lang('Pusher app cluster')</label>
                        <input type="text" name="PUSHER_APP_CLUSTER"
                               value="{{ old('PUSHER_APP_CLUSTER',env('PUSHER_APP_CLUSTER')) }}" required="required"
                               class="form-control ">
                        @error('PUSHER_APP_CLUSTER')
                        <span class="text-danger">{{ trans($message) }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-sm-4  col-12">
                        <label >@lang('Push Notification')</label>
                        <div class="custom-switch-btn">
                            <input type='hidden' value='1' name='push_notification'>
                            <input type="checkbox" name="push_notification" class="custom-switch-checkbox"
                                   id="push_notification"
                                   value="0" {{($control->push_notification == 0) ? 'checked' : ''}} >
                            <label class="custom-switch-checkbox-label" for="push_notification">
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

