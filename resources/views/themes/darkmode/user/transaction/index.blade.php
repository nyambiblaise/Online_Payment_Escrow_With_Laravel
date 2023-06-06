@extends($theme.'layouts.user')
@section('title', trans('Transaction'))
@section('content')

    @include($theme.'partials.banner')



    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-12">
                    <div class="card secbg form-block p-0 br-4">
                        <div class="card-body">
                            <form action="{{route('user.transaction.search')}}" method="get">
                                <div class="row">
                                    <div class="col-md-6  col-lg-3 mb-2">
                                        <div class="form-group">
                                            <input type="text" name="transaction_id"
                                                   value="{{@request()->transaction_id}}"
                                                   class="form-control"
                                                   placeholder="@lang('Search for Transaction ID')">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3  mb-2">
                                        <div class="form-group">
                                            <input type="text" name="remark" value="{{@request()->remark}}"
                                                   class="form-control"
                                                   placeholder="@lang('Remark')">
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-3  mb-2">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="datetrx" id="datepicker"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-2">
                                        <div class="form-group">
                                            <button type="submit" class="w-100 cmn-btn">
                                                <i class="las la-search"></i> @lang('Search')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card secbg">
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped text-white" id="service-table">
                                    <thead>
                                    <tr>
                                        <th>@lang('SL No.')</th>
                                        <th>@lang('Transaction ID')</th>
                                        <th>@lang('Amount')</th>
                                        <th>@lang('Charge')</th>
                                        <th>@lang('Remarks')</th>
                                        <th>@lang('Time')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($transactions as $transaction)
                                        <tr>
                                            <td data-label="@lang('SL No.')">{{loopIndex($transactions) + $loop->index}}</td>
                                            <td data-label="@lang('Transaction ID')">@lang($transaction->trx_id)</td>
                                            <td data-label="@lang('Amount')">
                                        <span
                                            class="font-weight-bold text-{{($transaction->trx_type == "+") ? 'success': 'danger'}}"> {{getAmount($transaction->amount)}} {{trans(config('basic.currency'))}}</span>
                                            </td>

                                            <td data-label="@lang('Charge')">
                                        <span
                                            class="font-weight-bold ">{{getAmount($transaction->charge)}} {{trans(config('basic.currency_symbol'))}}</span>
                                            </td>
                                            <td data-label="@lang('Remarks')"> @lang($transaction->remarks)</td>
                                            <td data-label="@lang('Time')">
                                                {{ dateTime($transaction->created_at, 'd M Y h:i A') }}
                                            </td>
                                        </tr>
                                    @empty

                                        <tr class="text-center">
                                            <td colspan="100%">{{__('No Data Found!')}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                            </div>
                            {{ $transactions->appends($_GET)->links($theme.'partials.pagination') }}

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection
