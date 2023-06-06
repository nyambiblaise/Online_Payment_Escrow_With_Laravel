@extends('admin.layouts.app')
@section('title', trans($title))


@section('content')
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="{{ route('admin.escrow.search')}}" method="get">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" name="search" value="{{@request()->search}}" class="form-control"
                                       placeholder="@lang('Invoice ID')">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_time" id="datepicker"/>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="">@lang('All Status')</option>
                                    <option value="pending" @if(@request()->status == 'pending') selected @endif>@lang('Pending')</option>
                                    <option value="pending" @if(@request()->status == 'hold') selected @endif>@lang('Hold')</option>
                                    <option value="completed" @if(@request()->status == 'completed') selected @endif>@lang('Completed')</option>
                                    <option value="disputed" @if(@request()->status == 'disputed') selected @endif>@lang('Disputed')</option>
                                    <option value="resolved" @if(@request()->status == 'resolved') selected @endif>@lang('Resolved')</option>
                                    <option value="rejected" @if(@request()->status == 'rejected') selected @endif>@lang('Rejected')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary"><i
                                        class="fas fa-search"></i> @lang('Search')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card card-primary m-0 m-md-4 my-4 m-md-0">
        <div class="card-body">


            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('No.')</th>
                        <th scope="col">@lang('Invoice ID')</th>
                        <th scope="col">@lang('Invitor')</th>
                        <th scope="col">@lang('Invitee')</th>
                        <th scope="col">@lang('Title')</th>
                        <th scope="col">@lang('Amount')</th>
                        <th scope="col">@lang('Status')</th>
                        <th scope="col">@lang('Date')</th>
                        <th scope="col">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($escrowList as $item)
                        <tr>
                            <td data-label="@lang('No.')">{{loopIndex($escrowList) + $loop->index	 }}</td>
                            <td data-label="@lang('Invoice ID')">@lang($item->invoice)</td>
                            <td data-label="@lang('Invitor')">
                                <a href="{{route('admin.user-edit',$item->creator_id)}}">
                                    @lang(optional($item->user)->username)
                                </a>

                            </td>
                            <td data-label="@lang('Invitee')">
                                <a href="{{route('admin.user-edit',$item->joiner_id)}}">
                                    @lang(optional($item->invitee)->username)
                                </a>
                            </td>
                            <td data-label="@lang('Title')">@lang(($item->title)? : '-')</td>
                            <td data-label="@lang('Amount')">{{getAmount($item->amount)}} {{trans(config('basic.currency'))}}</td>

                            <td data-label="@lang('Status')">
                                @if($item['status'] == 0)
                                    <span class="badge badge-pill badge-secondary">{{trans('Pending')}}</span>
                                @elseif($item['status'] == 2)
                                    <span class="badge badge-pill badge-danger">{{trans('Rejected')}}</span>
                                @elseif($item['status'] == 1 && $item['payment_status'] == 0)
                                    <span class="badge badge-pill badge-info">{{trans('Hold')}}</span>
                                @elseif($item['status'] == 1 && $item['payment_status'] == 1)
                                    <span class="badge badge-pill badge-success">{{trans('Completed')}}</span>
                                @elseif($item['status'] == 1 && $item['payment_status'] == 2)
                                    <span class="badge badge-pill badge-warning">{{trans('Disputed')}}</span>
                                @elseif($item['status'] == 1 && $item['payment_status'] == 3)
                                    <span class="badge badge-pill badge-primary">{{trans('Resolved by Admin')}}</span>
                                @endif
                            </td>

                            <td data-label="@lang('Date')">
                                {{dateTime($item->created_at)}}
                            </td>

                            <td data-label="@lang('Action')">
                                <div class="dropdown show">
                                    <a class="dropdown-toggle p-3" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('admin.escrow.details',$item->id)}}">
                                            <i class="fa fa-eye text-warning pr-2"
                                               aria-hidden="true"></i> @lang('Details')
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-danger" colspan="9">@lang('No User Data')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$escrowList->appends(@$search)->links('partials.pagination')}}

            </div>
        </div>
    </div>





@endsection


@push('js')
    <script>
        "use strict";

        $(document).ready(function () {
            $('select').select2({
                selectOnClose: true
            });
        });

    </script>
@endpush
