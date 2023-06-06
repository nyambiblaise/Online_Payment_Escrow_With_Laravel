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

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card secbg text-center">
                        <div class="card-body d-flex flex-wrap justify-content-evenly align-items-center">
                            <div>
                                <img src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}" class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                            </div>

                            <div>
                                <h4 class="mt-2">@lang('Please Pay') {{getAmount($order->final_amount)}} {{$order->gateway_currency}}</h4>
                                <h4 class="mt-1">@lang('To Get') {{getAmount($order->amount)}}  {{$basic->currency}}</h4>
                                <form action="{{$data->url}}" method="{{$data->method}}">
                                    <script
                                        src="{{$data->src}}"
                                        class="stripe-button"
                                        @foreach($data->val as $key=> $value)
                                        data-{{$key}}="{{$value}}"
                                        @endforeach>
                                    </script>
                                </form>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    @push('script')
        <script>
            "use strict";
            $(document).ready(function () {
                $('button[type="submit"]').removeClass("stripe-button-el").addClass("cmn-btn mt-2").find('span').css('min-height', 'initial');
            })
        </script>
    @endpush

@endsection




