@extends($theme.'layouts.user')
@section('title',__($page_title))

@section('content')
    @include($theme.'partials.banner')


    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card secbg ">
                        <div class="card-header  justify-content-between align-items-center d-flex mt-3">
                            <h5 class="card-title ">@lang($page_title)</h5>
                            <a href="{{route('user.ticket.create')}}" class="btn btn-sm btn-success"> <i
                                    class="fa fa-plus-circle"></i> @lang('Create Ticket')</a>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-dark table-striped text-white" id="service-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Subject')</th>
                                        <th scope="col">@lang('Status')</th>
                                        <th scope="col">@lang('Last Reply')</th>
                                        <th scope="col">@lang('Action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($tickets as $key => $ticket)
                                        <tr>
                                            <td data-label="@lang('Subject')">
                                                    <span
                                                        class="font-weight-bold"> [{{ trans('Ticket#').$ticket->ticket }}
                                                        ] {{ $ticket->subject }} </span>
                                            </td>
                                            <td data-label="@lang('Status')">
                                                @if($ticket->status == 0)
                                                    <span class="badge bg-success">@lang('Open')</span>
                                                @elseif($ticket->status == 1)
                                                    <span class="badge bg-primary">@lang('Answered')</span>
                                                @elseif($ticket->status == 2)
                                                    <span class="badge bg-warning">@lang('Replied')</span>
                                                @elseif($ticket->status == 3)
                                                    <span class="badge bg-dark">@lang('Closed')</span>
                                                @endif
                                            </td>

                                            <td data-label="@lang('Last Reply')">
                                                {{diffForHumans($ticket->last_reply) }}
                                            </td>

                                            <td data-label="@lang('Action')">
                                                <a href="{{ route('user.ticket.view', $ticket->ticket) }}"
                                                   class="btn btn-info btn-sm infoButton "
                                                   data-toggle="tooltip" title="" data-original-title="Details">
                                                    <i class="la la-info-circle"></i>
                                                </a>
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

                            {{ $tickets->appends($_GET)->links($theme.'partials.pagination') }}


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
