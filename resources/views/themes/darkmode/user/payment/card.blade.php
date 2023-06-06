@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection

@section('content')
    @push('style')
        <link href="{{ asset('assets/admin/css/card-js.min.css') }}" rel="stylesheet" type="text/css"/>
        <style>
            .card-js .icon {
                top: 5px;
            }
            .card-js input,
            .card-js input:hover,
            .card-js input:focus,
            .card-js input,
            .card-js select{
                color: #fff;
                background-color: #24283e;
            }
            .card-js .form-control{
                border: 1px solid #fff;
            }
            .card-js .card-number-wrapper, .card-js .cvc-wrapper, .card-js .expiry-wrapper, .card-js .name-wrapper{
                box-shadow: none;
            }
        </style>
    @endpush

    @include($theme.'partials.banner')




    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card secbg">
                        <div class="card-header mt-3">
                        <h5 class="card-title text-center"> @lang('Your Card Information')</h5>
                        </div>
                        <div class="card-body ">

                            <div class="row ">
                                <div class="col-md-3">
                                        <img  src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}"
                                            class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                                </div>

                                <div class="col-md-9">
                                    <form class="form-horizontal" action="{{ route('ipn', [optional($order->gateway)->code ?? '', $order->transaction]) }}" method="post">
                                        <div class="card-js form-group--payment-card">

                                            <input class="card-number form-control mb-3"
                                                   name="card_number"
                                                   placeholder="@lang('Card Number')"
                                                   autocomplete="off"
                                                   required>

                                            <input class="name form-control mb-3"
                                                   id="the-card-name-id"
                                                   name="card_name"
                                                   placeholder="@lang('Name On Your Card')"
                                                   autocomplete="off"
                                                   required>
                                            <input class="expiry form-control mb-3"
                                                   autocomplete="off"
                                                   required>
                                            <input class="expiry-month" name="expiry_month">
                                            <input class="expiry-year" name="expiry_year">
                                            <input class="cvc form-control mb-3"
                                                   name="card_cvc"
                                                   autocomplete="off"
                                                   required>
                                        </div>

                                        <button type="submit" class="cmn-btn w-100">@lang('Submit')</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script src="{{ asset('assets/admin/js/card-js.min.js') }}"></script>
    @endpush

@endsection
