@extends($theme.'layouts.user')
@section('title',trans('Fund History'))
@section('content')
    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card secbg form-block p-0 br-4">
                        <div class="card-body">

                            <form action="{{ route('user.fund-history.search') }}" method="get">
                                <div class="row justify-content-between">
                                    <div class="col-md-6  col-lg-3 mb-2">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{@request()->name}}"
                                                   class="form-control"
                                                   placeholder="@lang('Type Here')">
                                        </div>
                                    </div>

                                    <div class="col-md-6  col-lg-3 mb-2">
                                        <div class="form-group">
                                            <select name="status" class="form-control">
                                                <option value="">@lang('All Payment')</option>
                                                <option value="1"
                                                        @if(@request()->status == '1') selected @endif>@lang('Complete Payment')</option>
                                                <option value="2"
                                                        @if(@request()->status == '2') selected @endif>@lang('Pending Payment')</option>
                                                <option value="3"
                                                        @if(@request()->status == '3') selected @endif>@lang('Cancel Payment')</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3  mb-2">
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="date_time"
                                                   id="datepicker"/>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-3 mb-2">
                                        <div class="form-group">
                                            <button type="submit" class="cmn-btn w-100">
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
                    <div class="card secbg ">
                        <div class="card-body ">

                            <div class="table-responsive">
                                <table class="table table-dark table-striped text-white" id="service-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Transaction ID')</th>
                                        <th scope="col">@lang('Gateway')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Charge')</th>
                                        <th scope="col">@lang('Status')</th>
                                        <th scope="col">@lang('Time')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($funds as $data)
                                        <tr>

                                            <td data-label="#@lang('Transaction ID')">{{$data->transaction}}</td>
                                            <td data-label="@lang('Gateway')">@lang(optional($data->gateway)->name)</td>
                                            <td data-label="@lang('Amount')">
                                                <strong>{{getAmount($data->amount)}} @lang($basic->currency)</strong>
                                            </td>

                                            <td data-label="@lang('Charge')">
                                                <strong>{{getAmount($data->charge)}} @lang($basic->currency)</strong>
                                            </td>

                                            <td data-label="@lang('Status')">
                                                @if($data->status == 1)
                                                    <span class="badge bg-success">@lang('Complete')</span>
                                                @elseif($data->status == 2)
                                                    <span class="badge bg-warning">@lang('Pending')</span>
                                                @elseif($data->status == 3)
                                                    <span class="badge bg-danger">@lang('Cancel')</span>
                                                @endif
                                            </td>

                                            <td data-label="@lang('Time')">
                                                {{ dateTime($data->created_at, 'd M Y h:i A') }}
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

                            {{ $funds->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

