@extends($theme.'layouts.user')
@section('title',trans('Dashboard'))
@section('content')


    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="las la-wallet"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($walletBalance)}}</span>
                        <span class="count-name">{{trans('Balance')}}</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="las la-money-bill"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($totalDeposit)}}</span>
                        <span class="count-name">{{trans('Total Deposit')}}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="las la-hand-holding-usd"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($totalPayout)}}</span>
                        <span class="count-name">{{trans('Total Payout')}}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="las la-spinner"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['PendingAmount'])}}</span>

                        @if(isset($escrow['Pending']) && 0 < $escrow['Pending'])
                            <span class="count-subtitle"> {{$escrow['Pending']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Pending Escrow')}}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter fluorescent">
                        <i class="las la-times-circle"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['RejectedAmount'])}}</span>

                        @if(isset($escrow['Rejected']) && 0 < $escrow['Rejected'])
                            <span class="count-subtitle">{{$escrow['Rejected']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Rejected Escrow')}}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter pumkin">
                        <i class="las la-lock"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['HoldAmount'])}}</span>

                        @if(isset($escrow['PaymentHold']) && 0 < $escrow['PaymentHold'])
                            <span class="count-subtitle">{{$escrow['PaymentHold']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Payment Hold')}}</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter splash">
                        <i class="las la-check-circle"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['CompleteAmount'])}}</span>

                        @if(isset($escrow['PaymentComplete']) && 0 < $escrow['PaymentComplete'])
                            <span class="count-subtitle">{{$escrow['PaymentComplete']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Completed Escrow')}}</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter purple">
                        <i class="las la-hand-holding-usd"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['ReleaseAmount'])}}</span>

                        @if(isset($escrow['PaymentRelease']) && 0 < $escrow['PaymentRelease'])
                            <span class="count-subtitle">{{$escrow['PaymentRelease']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Release Escrow')}}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter purple2">
                        <i class="las la-wallet"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['ReceivedAmount'])}}</span>

                        @if(isset($escrow['PaymentReceived']) && 0 < $escrow['PaymentReceived'])
                            <span class="count-subtitle">{{$escrow['PaymentReceived']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Received Payment')}}</span>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter pink">
                        <i class="las la-people-carry"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['DisputedAmount'])}}</span>

                        @if(isset($escrow['Disputed']) && 0 < $escrow['Disputed'])
                            <span class="count-subtitle">{{$escrow['Disputed']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Disputed Amount')}}</span>


                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter celestial">
                        <i class="las la-hands-helping"></i>
                        <span
                            class="count-numbers">{{trans(config('basic.currency_symbol'))}}{{getAmount($escrow['ResolvedAmount'])}}</span>
                        @if(isset($escrow['ResolvedByAdmin']) && 0 < $escrow['ResolvedByAdmin'])
                            <span class="count-subtitle">{{$escrow['ResolvedByAdmin']}} {{trans('Times')}}</span>
                        @endisset
                        <span class="count-name">{{trans('Resolved Payment')}}</span>

                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card-counter liberty">
                        <i class="la la-ticket"></i>
                        <span class="count-numbers">{{$ticket}}</span>
                        <span class="count-name">{{trans('Support Ticket')}}</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection


@push('script')
@endpush
