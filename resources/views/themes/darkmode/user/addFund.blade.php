@extends($theme.'layouts.user')

@section('title',trans('Add Fund'))
@section('content')
    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">

        <div class="container">
            <div class="row justify-content-center">
                @foreach($gateways as $key => $gateway)
                    <div class="col-6 col-sm-6 col-md-4   col-lg-3 col-xl-3 col-xxl-2">
                        <div class="card gateway text-center mb-3">

                            <div class="card-body">
                                <img src="{{ getFile(config('location.gateway.path').$gateway->image)}}"
                                     alt="{{$gateway->name}}" class="gateway w-100">
                            </div>

                            <div class="card-footer px-0 pb-0">
                                <button type="button"
                                        data-id="{{$gateway->id}}"
                                        data-name="{{$gateway->name}}"
                                        data-currency="{{$gateway->currency}}"
                                        data-gateway="{{$gateway->code}}"
                                        data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                        data-max_amount="{{getAmount($gateway->max_amount,$basic->fraction_number)}}"
                                        data-percent_charge="{{getAmount($gateway->percentage_charge,$basic->fraction_number)}}"
                                        data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"
                                        class="cmn-btn w-100 addFund lh-35"

                                        data-bs-backdrop='static' data-bs-keyboard='false'
                                        data-bs-toggle="modal"
                                        data-bs-target="#addFundModal">@lang('Pay Now')</button>
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

                    <div class="modal-body ">
                        <div class="payment-form ">
                            <p class="text-danger depositLimit"></p>
                            <p class="text-danger depositCharge"></p>
                            <input type="hidden" class="gateway" name="gateway" value="">
                            <div class="form-group mb-30">
                                <label>@lang('Amount')</label>
                                <div class="input-group">
                                    <input type="text" class="amount form-control" name="amount">
                                    <span class="input-group-text show-currency"></span>
                                </div>
                                <pre class="text-danger errors text-start ps-5"></pre>
                            </div>


                        </div>

                        <div class="payment-info text-center">
                            <img id="loading" src="{{asset('assets/admin/images/loading.gif')}}" alt="..."
                                 class="w-15px"/>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="cmn-btn checkCalc">@lang('Next')<i class="la la-arrow-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
    @endpush


@endsection




@push('script')

    <script>
        $('#loading').hide();
        "use strict";
        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, amount, gateway;
        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "{{config('basic.currency_symbol')}}";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`@lang('Transaction Limit') : ${minAmount} - ${maxAmount}  ${baseSymbol}`);

            var depositCharge = `@lang('Charge') : ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);

            $('.method-name').text(`@lang('Payment By') ${$(this).data('name')} - ${currency}`);
            $('.show-currency').text("{{config('basic.currency')}}");
            $('.gateway').val(currency);

            // amount
        });


        $(".checkCalc").on('click', function () {
            $('.payment-form').addClass('d-none');
            $('#loading').show();
            $('.modal-backdrop.fade').addClass('show');
            amount = $('.amount').val();
            $.ajax({
                url: "{{route('user.addFund.request')}}",
                type: 'POST',
                data: {
                    amount,
                    gateway
                },
                success(data) {

                    $('.payment-form').addClass('d-none');
                    $('.checkCalc').closest('.modal-footer').addClass('d-none');

                    var htmlData = `
                     <ul class="list-group text-center">
                        <li class="list-group-item bg-transparent">
                            <img src="${data.gateway_image}" class="gateway_image_preview"/>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Amount'):
                            <strong>${data.amount} </strong>
                        </li>
                        <li class="list-group-item bg-transparent">@lang('Charge'):
                                <strong>${data.charge}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Payable'): <strong> ${data.payable}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            @lang('Conversion Rate'): <strong>${data.conversion_rate}</strong>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <strong>${data.in}</strong>
                        </li>

                        ${(data.isCrypto == true) ? `
                        <li class="list-group-item bg-transparent">
                            ${data.conversion_with}
                        </li>
                        ` : ``}

                        <li class="list-group-item bg-transparent">
                        <a href="${data.payment_url}" class="cmn-btn w-100 addFund ">@lang('Pay Now')</a>
                        </li>
                        </ul>`;

                    $('.payment-info').html(htmlData)
                },
                complete: function () {
                    $('#loading').hide();
                },
                error(err) {
                    var errors = err.responseJSON;
                    for (var obj in errors) {
                        $('.errors').text(`${errors[obj]}`)
                    }
                    $('.payment-form').removeClass('d-none');
                }
            });
        });


        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.payment-form').removeClass('d-none');
            $('.checkCalc').closest('.modal-footer').removeClass('d-none');
            $('.payment-info').html(``)
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });

    </script>
@endpush

