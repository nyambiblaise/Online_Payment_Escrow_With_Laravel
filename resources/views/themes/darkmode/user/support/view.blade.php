@extends($theme.'layouts.user')
@section('title',trans($page_title))
@push('style')
@endpush
@section('content')
    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card secbg form-block">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center d-flex flex-wrap">
                                <div class="col-sm-10 col-10">
                                    @if($ticket->status == 0)
                                        <span class="badge bg-primary">@lang('Open')</span>
                                    @elseif($ticket->status == 1)
                                        <span class="badge bg-success">@lang('Answered')</span>
                                    @elseif($ticket->status == 2)
                                        <span class="badge bg-dark">@lang('Customer Reply')</span>
                                    @elseif($ticket->status == 3)
                                        <span class="badge bg-danger">@lang('Closed')</span>
                                    @endif
                                    [{{trans('Ticket#'). $ticket->ticket }}] {{ $ticket->subject }}
                                </div>
                                <div class="col-sm-2 col-2">
                                    <div class="text-sm-right mt-sm-0 mt-3">
                                        <button type="button" class="btn btn-sm btn-danger float-right"
                                                title="{{trans('Close')}}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#closeTicketModal"><i
                                                class="las la-times-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-row d-flex flex-wrap justify-content-between align-items-center" action="{{ route('user.ticket.reply', $ticket->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-sm-12 col-md-10 col-12">
                                    <div class="input--group mt-0 mb-0">
                                                <textarea name="message" class="form-control  ticket-box w-100"
                                                          id="textarea1"
                                                          placeholder="@lang('Type Here')"
                                                          rows="3">{{old('message')}}</textarea>
                                    </div>
                                    @error('message')
                                    <span class="text-danger">{{trans($message)}}</span>
                                    @enderror
                                </div>


                                <div class=" col-sm-12 col-md-2 col-12">
                                    <div class="input--group">
                                        <div class="card-body-buttons mt-2 gap-3 mx-auto">

                                            <div class="upload-btn ">
                                                <div class="btn btn-primary new-file-upload "
                                                     title="{{trans('Image Upload')}}">
                                                    <a href="#">
                                                        <i class="la la-image"></i>
                                                    </a>
                                                    <input type="file" name="attachments[]" id="upload"
                                                           class="upload-box"
                                                           multiple
                                                           placeholder="@lang('Upload File')">
                                                </div>
                                                <p class="text-danger select-files-count"></p>
                                            </div>

                                            <div class="submit-btn">
                                                <button type="submit" name="replayTicket" value="1"
                                                        class="cmn-btn btn-sm " title="{{trans('Reply')}}"><i
                                                        class="lab la-telegram-plane"></i></button>
                                            </div>
                                        </div>
                                        @error('attachments')
                                        <span class="text-danger">{{trans($message)}}</span>
                                        @enderror

                                    </div>
                                </div>
                            </form>


                            @if(count($ticket->messages) > 0)
                                <div class="chat-box scrollable position-relative scroll-height">
                                    <ul class="chat-list  ">
                                        @foreach($ticket->messages as $item)
                                            @if($item->admin_id == null)
                                                <li class="chat-item list-style-none replied mt-3 text-right">
                                                    <div class="chat-img d-inline-block">
                                                        <img
                                                            src="{{getFile(config('location.user.path').optional($ticket->user)->image)}}"
                                                            alt="user"
                                                            class="rounded-circle" width="45">
                                                    </div>
                                                    <div class="w-100 text-right">
                                                        <div class="chat-content d-inline-block pr-3">
                                                            <h6 class="font-weight-medium">{{optional($ticket->user)->username}} </h6>

                                                            <div class="d-flex flex-row-reverse">
                                                                <div class="msg p-2 d-inline-block mb-1">
                                                                    {{$item->message}}
                                                                </div>

                                                            </div>

                                                            @if(0 < count($item->attachments))
                                                                <div class="d-flex justify-content-end gap-2 ">
                                                                    @foreach($item->attachments as $k=> $image)
                                                                        <a href="{{route('user.ticket.download',encrypt($image->id))}}"
                                                                           class="ml-3 nowrap ticket-link"><i
                                                                                class="fa fa-file"></i> @lang('File') {{++$k}}
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <div
                                                                class="chat-time">{{dateTime($item->created_at, 'd M, y h:i A')}}
                                                            </div>

                                                        </div>

                                                    </div>

                                                </li>


                                            @else

                                                <li class="chat-item list-style-none mt-3">
                                                    <div class="chat-img d-flex ">
                                                        <div class="chat-img d-inline-block ">
                                                            <img
                                                                src="{{getFile(config('location.admin.path').optional($item->admin)->image)}}"
                                                                alt="user"
                                                                class="rounded-circle" width="45">
                                                        </div>
                                                        <div class="chat-content d-inline-block pl-3">
                                                            <h6 class="font-weight-medium">{{optional($item->admin)->name}}</h6>

                                                            <div class="media">
                                                                <div class="msg p-2 d-inline-block mb-1">
                                                                    {{$item->message}}
                                                                </div>

                                                            </div>


                                                            @if(0 < count($item->attachments))
                                                                <div class="d-flex justify-content-start">
                                                                    @foreach($item->attachments as $k=> $image)
                                                                        <a href="{{route('user.ticket.download',encrypt($image->id))}}"
                                                                           class="mr-3 nowrap"><i
                                                                                class="fa fa-file"></i> @lang('File') {{++$k}}
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @endif


                                                            <div
                                                                class="chat-time d-block font-10 mt-0 mr-0 mb-3">{{dateTime($item->created_at, 'd M, y h:i A')}}</div>
                                                        </div>

                                                    </div>

                                                </li>


                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <div class="modal fade" id="closeTicketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content form-block">

                <form method="post" action="{{ route('user.ticket.reply', $ticket->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title"> @lang('Confirmation')</h5>
                        <button type="button" class="close close-button" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>@lang('Are you want to close ticket?')</p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">
                            @lang('Close')
                        </button>

                        <button type="submit" class="btn btn-success btn-sm" name="replayTicket"
                                value="2">@lang("Confirm")
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        'use strict';
        $(document).on('change', '#upload', function () {
            var fileCount = $(this)[0].files.length;
            $('.select-files-count').text(fileCount + ' file(s) selected')
        })
    </script>
@endpush


