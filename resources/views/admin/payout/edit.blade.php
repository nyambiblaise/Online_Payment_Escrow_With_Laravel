@extends('admin.layouts.app')
@section('title',trans($page_title))
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary m-0 m-md-4 my-4 m-md-0">
                <div class="card-body">

                    <div class="media mb-4 justify-content-end">
                        <a href="{{route('admin.payout-method')}}" class="btn btn-sm  btn-primary mr-2">
                            <span><i class="fas fa-eye"></i> @lang('Payout Method')</span>
                        </a>
                    </div>


                    <form method="post" action="{{route('admin.payout-method.update', $method->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-6 col-6">
                                <label>{{trans('Name')}}</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       value="{{ old('name', $method->name ?? '') }}" required>

                                @error('name')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-6">
                                <label> {{trans('Duration')}} </label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           name="duration"
                                           value="{{ old('duration', $method->duration) }}"
                                           required="">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{ trans('Hour / Minutes/ Days') }}
                                        </div>
                                    </div>
                                </div>

                                @error('duration')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 col-6">
                                <label>{{trans('Minimum Amount')}}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           name="minimum_amount"
                                           value="{{ old('minimum_amount', round($method->minimum_amount, 2) ?? '') }}"
                                           required="">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{ trans($basic->currency) ?? trans('USD') }}
                                        </div>
                                    </div>
                                </div>

                                @error('minimum_amount')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-md-6 col-6">
                                <label>{{trans('Maximum Amount')}}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           name="maximum_amount"
                                           value="{{ old('maximum_amount', round($method->maximum_amount, 2) ?? '') }}"
                                           required="">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{ trans($basic->currency) ?? trans('USD') }}
                                        </div>
                                    </div>
                                </div>

                                @error('maximum_amount')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-6">
                                <label>@lang('Percent Charge')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           name="percent_charge"
                                           value="{{ old('percent_charge', round($method->percent_charge, 2) ?? '') }}"
                                           required="">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{trans('%')}}
                                        </div>
                                    </div>
                                </div>
                                @error('percent_charge')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-6">
                                <label>@lang('Fixed Charge')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           name="fixed_charge"
                                           value="{{ old('fixed_charge', round($method->fixed_charge, 2) ?? '') }}"
                                           required="">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{ trans($basic->currency) ?? trans('USD') }}
                                        </div>
                                    </div>
                                </div>

                                @error('fixed_charge')
                                <span class="text-danger">{{ trans($message)  }}</span>
                                @enderror

                            </div>
                        </div>


                        <div class="row justify-content-between">

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <div class="image-input ">
                                        <label for="image-upload" id="image-label"><i class="fas fa-upload"></i></label>
                                        <input type="file" name="image" placeholder="@lang('Choose image')" id="image">
                                        <img id="image_preview_container" class="preview-image"
                                             src="{{ getFile(config('location.withdraw.path').$method->image)}}"
                                             alt="preview image">
                                    </div>
                                </div>
                                @error('image')
                                <span class="text-danger">{{ trans($message) }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-between">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Status')</label>
                                    <div class="custom-switch-btn">
                                        <input type='hidden' value='1' name='status'>
                                        <input type="checkbox" name="status" class="custom-switch-checkbox" id="status"
                                               value="0" {{($method->status == 0) ? 'checked':''}}>
                                        <label class="custom-switch-checkbox-label" for="status">
                                            <span class="custom-switch-checkbox-inner"></span>
                                            <span class="custom-switch-checkbox-switch"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn btn-success float-right mt-3" id="generate"><i
                                            class="fa fa-plus-circle"></i> {{trans('Add Field')}}</a>
                                </div>
                            </div>

                        </div>


                        <div class="row addedField">

                            @if($method->input_form)
                                @foreach ($method->input_form as $k => $v)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input name="field_name[]" class="form-control"
                                                       type="text" value="{{$v->field_level}}" required
                                                       placeholder="{{trans('Field Name')}}">

                                                <select name="type[]" class="form-control  ">
                                                    <option value="text"
                                                            @if($v->type == 'text') selected @endif>{{trans('Input Text')}}</option>
                                                    <option value="textarea"
                                                            @if($v->type == 'textarea') selected @endif>{{trans('Textarea')}}</option>
                                                    <option value="file"
                                                            @if($v->type == 'file') selected @endif>{{trans('File upload')}}</option>
                                                </select>

                                                <select name="validation[]" class="form-control  ">
                                                    <option value="required"
                                                            @if($v->validation == 'required') selected @endif>{{trans('Required')}}</option>
                                                    <option value="nullable"
                                                            @if($v->validation == 'nullable') selected @endif>{{trans('Optional')}}</option>
                                                </select>

                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger  delete_desc" type="button">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button type="submit"
                                class="btn  btn-primary btn-block mt-3">@lang('Save Changes')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
@push('js')
    <script>
        $(document).ready(function (e) {
            "use strict";

            $("#generate").on('click', function () {
                var form = `<div class="col-md-12">
        <div class="form-group">
            <div class="input-group">
                <input name="field_name[]" class="form-control " type="text" value="" required
                       placeholder="@lang("Field Name")">

                <select name="type[]" class="form-control ">
                    <option value="text">@lang("Input Text")</option>
                    <option value="textarea">@lang("Textarea")</option>
                    <option value="file">@lang("File upload")</option>
                </select>

                <select name="validation[]" class="form-control  ">
                    <option value="required">@lang('Required')</option>
                    <option value="nullable">@lang('Optional')</option>
                </select>

                <span class="input-group-btn">
                    <button class="btn btn-danger  delete_desc" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>` ;
                $('.addedField').append(form)
            });


            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').parent().remove();
            });


            $('#image').change(function () {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $(document).ready(function () {
                $('select').select2({
                    selectOnClose: true
                });
            });
        });

    </script>
@endpush
