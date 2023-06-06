@extends($theme.'layouts.user')
@section('title')
    {{ 'Pay with '.optional($order->gateway)->name ?? '' }}
@endsection


@section('content')

    @include($theme.'partials.banner')


    <section id="feature" class="about-page secbg-1 py-5">
        <div class="feature-wrapper add-fund">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card secbg">
                            <div class="card-body text-center">
                                <h3 class="card-title">@lang('Payment Preview')</h3>
                                <h4> @lang('PLEASE SEND EXACTLY') <span
                                        class="text-success"> {{ getAmount($data->amount) }}</span> {{$data->gateway_currency}}
                                </h4>
                                <h5>@lang('TO') <span class="text-success"> {{ $data->sendto }}</span></h5>
                                <img src="{{$data->img}}" alt="..">
                                <h4 class="text-color font-weight-bold">@lang('SCAN TO SEND')</h4>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

