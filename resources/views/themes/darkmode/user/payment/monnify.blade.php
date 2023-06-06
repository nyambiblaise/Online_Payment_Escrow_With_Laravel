@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection

@section('content')

    @include($theme.'partials.banner')


    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row">
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
                                <h4 class="mb-1 ">@lang('To Get') {{getAmount($order->amount)}}  {{trans($basic->currency)}}</h4>

                                <button class="cmn-btn  mt-2"
                                        onclick="payWithMonnify()">@lang('Pay via Monnify')
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('script')
    <script type="text/javascript" src="//sdk.monnify.com/plugin/monnify.js"></script>
    <script type="text/javascript">
        function payWithMonnify() {
            MonnifySDK.initialize({
                amount: {{ $data->amount ?? '0' }},
                currency: "{{ $data->currency ?? 'NGN' }}",
                reference: "{{ $data->ref }}",
                customerName: "{{$data->customer_name ?? 'John Doe'}}",
                customerEmail: "{{$data->customer_email ?? 'example@example.com'}}",
                customerMobileNumber: "{{ $data->customer_phone ?? '0123' }}",
                apiKey: "{{ $data->api_key }}",
                contractCode: "{{ $data->contract_code }}",
                paymentDescription: "{{ $data->description }}",
                isTestMode: true,
                onComplete: function (response) {
                    if (response.paymentReference) {
                        window.location.href = '{{ route('ipn', ['monnify', $data->ref]) }}';
                    } else {
                        window.location.href = '{{ route('failed') }}';
                    }
                },
                onClose: function (data) {
                }
            });
        }
    </script>
    @endpush
@endsection
