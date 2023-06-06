@extends($theme.'layouts.user')
@section('title', trans($title))
@section('content')

    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">

            <div class="row justify-content-center">
                @foreach($gateways as $key => $gateway)
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6 col-6">
                        <div class="card gateway text-center mb-3">
                            <div class="card-body">
                                <img src="{{ getFile(config('location.withdraw.path').$gateway->image)}}"
                                     alt="{{$gateway->name}}" class="gateway w-100">

                                <div class="card-footer px-0 pb-0">
                                    <button type="button"
                                            data-id="{{$gateway->id}}"
                                            data-name="{{$gateway->name}}"
                                            data-min_amount="{{getAmount($gateway->minimum_amount, $basic->fraction_number)}}"
                                            data-max_amount="{{getAmount($gateway->maximum_amount,$basic->fraction_number)}}"
                                            data-percent_charge="{{getAmount($gateway->percent_charge,$basic->fraction_number)}}"
                                            data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"
                                            class="cmn-btn w-100 addFund px-0 px-sm-0 lh-xs-35"
                                            data-bs-backdrop='static' data-bs-keyboard='false'
                                            data-bs-toggle="modal"
                                            data-bs-target="#addFundModal">@lang('Payout Now')</button>

                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    @push('loadModal')
        <div id="addFundModal" class="modal fade addFundModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <form action="{{route('user.payout.moneyRequest')}}" method="post">
                        @csrf

                        <div class="modal-body ">
                            <div class="payment-form ">
                                <p class="text-danger depositLimit"></p>
                                <p class="text-danger depositCharge"></p>

                                <input type="hidden" class="gateway" name="gateway" value="">

                                <div class="form-group">
                                    <label>@lang('Amount')</label>
                                    <div class="input-group">
                                        <input type="text" class="amount form-control" name="amount">
                                        <span class="input-group-text show-currency"></span>
                                    </div>
                                    @error('amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                            </div>

                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="submit" class="cmn-btn ">@lang('Next')<i class="la la-arrow-right"></i>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endpush


@endsection



@push('script')
    <script>
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, gateway;

        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "{{trans(config('basic.currency_symbol'))}}";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`@lang('Transaction Limit') : ${minAmount} - ${maxAmount}  ${baseSymbol}`);
            var depositCharge = `@lang('Charge') : ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);
            $('.method-name').text(`@lang('Payout By') ${$(this).data('name')}`);
            $('.show-currency').text("{{trans(config('basic.currency'))}}");
            $('.gateway').val(id);
        });

        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });
    </script>
@endpush

