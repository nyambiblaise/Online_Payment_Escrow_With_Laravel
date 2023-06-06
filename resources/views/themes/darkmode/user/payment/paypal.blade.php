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
                    <div class="card secbg  text-center">
                        <div class="card-body d-flex flex-wrap justify-content-evenly align-items-center">
                            <div>
                                <img
                                    src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}"
                                    class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                            </div>

                            <div>
                                <h4 class="mt-2 ">@lang('Please Pay') {{getAmount($order->final_amount)}} {{trans($order->gateway_currency)}}</h4>
                                <h4 class="my-1">@lang('To Get') {{getAmount($order->amount)}}  {{trans($basic->currency)}}</h4>

                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script src="https://www.paypal.com/sdk/js?client-id={{ $data->cleint_id }}">
        </script>
        <script>
            paypal.Buttons({
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [
                            {
                                description: "{{ $data->description }}",
                                custom_id: "{{ $data->custom_id }}",
                                amount: {
                                    currency_code: "{{ $data->currency }}",
                                    value: "{{ $data->amount }}",
                                    breakdown: {
                                        item_total: {
                                            currency_code: "{{ $data->currency }}",
                                            value: "{{ $data->amount }}"
                                        }
                                    }
                                }
                            }
                        ]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        var trx = "{{ $data->custom_id }}";
                        window.location = '{{ url('payment/paypal')}}/' + trx + '/' + details.id
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endpush
@endsection
