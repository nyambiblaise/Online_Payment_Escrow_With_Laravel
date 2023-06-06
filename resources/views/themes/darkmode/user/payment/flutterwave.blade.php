@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection

@section('content')


    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">

                    <div class="card secbg text-center">
                        <div class="card-body d-flex flex-wrap justify-content-evenly align-items-center">
                            <div>
                                <img
                                    src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}"
                                    class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                            </div>
                            <div>
                                <h4 class="mt-2">@lang('Please Pay') {{getAmount($order->final_amount)}} {{trans($order->gateway_currency)}}</h4>
                                <h4 class="mt-1">@lang('To Get') {{getAmount($order->amount)}}  {{trans($basic->currency)}}</h4>

                                <button type="button" class="cmn-btn  mt-2" id="btn-confirm"
                                        onClick="payWithRave()">@lang('Pay Now')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('script')
        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        <script>
            var btn = document.querySelector("#btn-confirm");
            btn.setAttribute("type", "button");
            const API_publicKey = "{{$data->API_publicKey ?? ''}}";

            function payWithRave() {
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
                    customer_email: "{{$data->customer_email ?? 'example@example.com'}}",
                    amount: "{{ $data->amount ?? '0' }}",
                    customer_phone: "{{ $data->customer_phone ?? '0123' }}",
                    currency: "{{ $data->currency ?? 'USD' }}",
                    txref: "{{ $data->txref ?? '' }}",
                    onclose: function () {
                    },
                    callback: function (response) {
                        let txref = response.tx.txRef;
                        let status = response.tx.status;
                        window.location = '{{ url('payment/flutterwave') }}/' + txref + '/' + status;
                    }
                });
            }
        </script>
    @endpush
@endsection
