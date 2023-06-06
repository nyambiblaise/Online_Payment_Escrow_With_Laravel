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
                                <img src="{{getFile(config('location.gateway.path').optional($order->gateway)->image)}}" class=" img-thumbnail mx-auto d-block mb-3 mb-md-0" alt="..">
                            </div>

                            <div>
                                <h4 class="mt-2">@lang('Please Pay') {{getAmount($order->final_amount)}} {{$order->gateway_currency}}</h4>
                                <h4 class="mt-1">@lang('To Get') {{getAmount($order->amount)}}  {{$basic->currency}}</h4>
                                <form action="{{$data->url}}" method="{{$data->method}}">
                                    <script src="{{$data->checkout_js}}"
                                            @foreach($data->val as $key=>$value)
                                            data-{{$key}}="{{$value}}"
                                        @endforeach >
                                    </script>
                                    <input type="hidden" custom="{{$data->custom}}" name="hidden">
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
            $(document).ready(function () {
                $('input[type="submit"]').addClass(" btn-custom2 cmn-btn  mt-2");
            })
        </script>
    @endpush
@endsection




