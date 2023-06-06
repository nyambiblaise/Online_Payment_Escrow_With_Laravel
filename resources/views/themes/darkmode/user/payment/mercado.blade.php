@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection
@section('content')
    @include($theme.'partials.banner')


    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card secbg text-center">
                        <div class="card-body d-flex flex-wrap justify-content-evenly align-items-center">

                            <div>
                                <img
                                    src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}"
                                    class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                            </div>

                            <div>
                                <h4 class="mt-2 ">@lang('Please Pay') {{getAmount($order->final_amount)}} {{trans($order->gateway_currency)}}</h4>
                                <h4 class="mt-1 ">@lang('To Get') {{getAmount($order->amount)}}  {{trans($basic->currency)}}</h4>

                                <form
                                    action="{{ route('ipn', [optional($order->gateway)->code ?? 'mercadopago', $order->transaction]) }}"
                                    method="POST">
                                    <script
                                        src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
                                        data-preference-id="{{ $data->preference }}">
                                    </script>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
