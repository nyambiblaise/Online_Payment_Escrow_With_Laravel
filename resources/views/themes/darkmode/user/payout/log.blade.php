@extends($theme.'layouts.user')
@section('title',trans($title))
@section('content')
    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card secbg form-block p-0 br-4">
                        <div class="card-body">
                            <form action="{{ route('user.payout.history.search') }}" method="get">
                                <div class="row justify-content-between">
                                    <div class="col-md-6  col-lg-3 mb-2">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{@request()->name}}"
                                                   class="form-control"
                                                   placeholder="@lang('Type Here')">
                                        </div>
                                    </div>

                                    <div class="col-md-6  col-lg-3 mb-2">
                                        <div class="form-group ">
                                            <select name="status" class="form-control">
                                                <option value="">@lang('All Payment')</option>
                                                <option value="1"
                                                        @if(@request()->status == '1') selected @endif>@lang('Pending Payment')</option>
                                                <option value="2"
                                                        @if(@request()->status == '2') selected @endif>@lang('Complete Payment')</option>
                                                <option value="3"
                                                        @if(@request()->status == '3') selected @endif>@lang('Rejected Payment')</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3  mb-2">
                                        <div class="form-group ">
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
                                        <th scope="col">@lang('Detail')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payoutLog as $item)
                                        <tr>
                                            <td data-label="#@lang('Transaction ID')">{{$item->trx_id}}</td>
                                            <td data-label="@lang('Gateway')">@lang(optional($item->method)->name)</td>
                                            <td data-label="@lang('Amount')">
                                                <strong>{{getAmount($item->amount)}} @lang($basic->currency)</strong>
                                            </td>
                                            <td data-label="@lang('Charge')">
                                                <strong>{{getAmount($item->charge)}} @lang($basic->currency)</strong>
                                            </td>

                                            <td data-label="@lang('Status')">
                                                @if($item->status == 1)
                                                    <span class="badge bg-warning">@lang('Pending')</span>
                                                @elseif($item->status == 2)
                                                    <span class="badge bg-success">@lang('Complete')</span>
                                                @elseif($item->status == 3)
                                                    <span class="badge bg-danger">@lang('Cancel')</span>
                                                @endif
                                            </td>

                                            <td data-label="@lang('Time')">
                                                {{ dateTime($item->created_at, 'd M Y h:i A') }}
                                            </td>
                                            <td data-label="@lang('Detail')">
                                                <button type="button" class="btn btn-info btn-sm infoButton "
                                                        data-information="{{json_encode($item->information)}}"
                                                        data-feedback="{{$item->feedback}}"
                                                        data-trx_id="{{ $item->trx_id }}"><i
                                                        class="la la-info-circle"></i></button>
                                            </td>

                                        </tr>
                                    @empty

                                        <tr class="text-center">
                                            <td colspan="100%">{{trans('No Data Found!')}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $payoutLog->appends($_GET)->links($theme.'partials.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div id="infoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content form-block">

                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <ul class="list-group ">
                        <li class="list-group-item bg-transparent">@lang('Transactions') : <span class="trx"></span>
                        </li>
                        <li class="list-group-item bg-transparent">@lang('Admin Feedback') : <span
                                class="feedback"></span></li>
                    </ul>
                    <div class="payout-detail ">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark closeModal" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        "use strict";

        $(document).ready(function () {
            $('.infoButton').on('click', function () {
                var infoModal = $('#infoModal');
                infoModal.find('.trx').text($(this).data('trx_id'));
                infoModal.find('.feedback').text($(this).data('feedback'));
                var list = [];
                var information = Object.entries($(this).data('information'));

                var ImgPath = "{{asset(config('location.withdrawLog.path'))}}/";
                var result = ``;
                for (var i = 0; i < information.length; i++) {
                    if (information[i][1].type == 'file') {
                        result += `<li class="list-group-item bg-transparent">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <img src="${ImgPath}/${information[i][1].field_name}" alt="..." class="w-100">
                                        </li>`;
                    } else {
                        result += `<li class="list-group-item bg-transparent">
                                            <span class="font-weight-bold "> ${information[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${information[i][1].field_name}</span>
                                        </li>`;
                    }
                }

                if (result) {
                    infoModal.find('.payout-detail').html(`<br><strong class="my-3">@lang('Payment Information')</strong>  ${result}`);
                } else {
                    infoModal.find('.payout-detail').html(`${result}`);
                }
                infoModal.modal('show');
            });


            $('.closeModal').on('click', function (e) {
                $("#infoModal").modal("hide");
            });
        });

    </script>
@endpush
