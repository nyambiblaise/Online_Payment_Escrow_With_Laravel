@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection


@section('content')

    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>


    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden secbg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="title text-center">{{trans('Please follow the instruction below')}}</h3>
                            <p class="text-center mt-2 ">{{trans('You have requested to deposit')}}  <b class="text--base">{{getAmount($order->amount)}}
                                {{$basic->currency}}</b> , {{trans('Please pay')}}
                                <b class="text--base">{{getAmount($order->final_amount)}} {{$order->gateway_currency}}</b>  {{trans('for successful payment')}}
                            </p>

                            <p class=" mt-2 ">
                                <?php echo optional($order->gateway)->note; ?>
                            </p>


                            <form action="" method="post" enctype="multipart/form-data"
                                  class="form-row  preview-form">
                                @csrf
                                @if(optional($order->gateway)->parameters)
                                    @foreach($order->gateway->parameters as $k => $v)
                                        @if($v->type == "text")
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group  ">
                                                    <label>{{trans($v->field_level)}} @if($v->validation == 'required') <span class="text--danger">*</span>  @endif </label>
                                                    <input type="text" name="{{$k}}"  class="form-control bg-transparent" @if($v->validation == "required") required @endif>
                                                    @if ($errors->has($k))
                                                        <span class="text--danger">{{ trans($errors->first($k)) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif($v->type == "textarea")
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label>{{trans($v->field_level)}} @if($v->validation == 'required') <span class="text--danger">*</span>  @endif </label>
                                                    <textarea name="{{$k}}" class="form-control bg-transparent" rows="3" @if($v->validation == "required") required @endif></textarea>
                                                    @if ($errors->has($k))
                                                        <span class="text--danger">{{ trans($errors->first($k)) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif($v->type == "file")
                                            <div class="col-md-12 mt-2">
                                                <label>{{trans($v->field_level)}} @if($v->validation == 'required') <span class="text--danger">*</span>  @endif </label>

                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new " data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail withdraw-thumbnail"
                                                             data-trigger="fileinput">
                                                            <img class="w-150px "
                                                                 src="{{ getFile(config('location.default')) }}"
                                                                 alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail wh-200-150 "></div>

                                                        <div class="img-input-div">
                                                                <span class="btn btn-success btn-file">
                                                                    <span
                                                                        class="fileinput-new "> @lang('Select') {{$v->field_level}}</span>
                                                                    <span
                                                                        class="fileinput-exists"> @lang('Change')</span>
                                                                    <input type="file" name="{{$k}}" accept="image/*"
                                                                           @if($v->validation == "required") required @endif>
                                                                </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists"
                                                               data-dismiss="fileinput"> @lang('Remove')</a>
                                                        </div>

                                                    </div>
                                                    @if ($errors->has($k))
                                                        <br>
                                                        <span
                                                            class="text--danger">{{ __($errors->first($k)) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif


                                <div class="col-md-12 ">
                                    <div class=" form-group">
                                        <button type="submit" class="cmn-btn w-100 mt-3">
                                            <span>@lang('Confirm Now')</span>
                                        </button>

                                    </div>
                                </div>

                            </form>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('css-lib')
    <link rel="stylesheet" href="{{asset($themeTrue.'css/bootstrap-fileinput.css')}}">
@endpush

@push('extra-js')
    <script src="{{asset($themeTrue.'js/bootstrap-fileinput.js')}}"></script>
@endpush





