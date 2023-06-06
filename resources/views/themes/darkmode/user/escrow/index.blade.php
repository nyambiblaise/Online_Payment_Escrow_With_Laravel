@extends($theme.'layouts.user')
@section('title', trans('My Escrow'))
@section('content')

    @include($theme.'partials.banner')



    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="cmn__card betting--card">
                <div class="card__body">
                    <div class="bets__area">
                        <ul class="bets__wrapper">
                            @forelse($myEscrow as $item)
                                <li class="bets__item position-relative">

                                    <div class="bets__item-content">
                                        <h6 class="bets__item-title"><a
                                                href="javascript:void(0)">@lang($item['title'])</a></h6>
                                        <h6 class="bets__item-subtitle">{{\Str::limit(trans($item['rules']),150)}}</h6>
                                        <p class="text-info">{{trans('Invoice ID')}} : <span
                                                class="text-white">{{$item['invoice']}}</span></p>

                                        <span class="bet__balance">
                                        {{getAmount($item['amount'])}} {{trans(config('basic.currency'))}}

                                            @if($item['status'] == 0)
                                                <span class="badge bg-secondary">{{trans('Pending')}}</span>
                                            @elseif($item['status'] == 2)
                                                <span class="badge bg-danger">{{trans('Rejected')}}</span>
                                            @elseif($item['status'] == 1 && $item['payment_status'] == 0)
                                                <span class="badge bg-info">{{trans('Hold')}}</span>
                                            @elseif($item['status'] == 1 && $item['payment_status'] == 1)
                                                <span class="badge bg-success">{{trans('Completed')}}</span>
                                            @elseif($item['status'] == 1 && $item['payment_status'] == 2)
                                                <span class="badge bg-warning">{{trans('Disputed')}}</span>
                                            @elseif($item['status'] == 1 && $item['payment_status'] == 3)
                                                <span class="badge bg-primary">{{trans('Resolved by Admin')}}</span>
                                            @endif

                                        </span>
                                    </div>

                                    <div class="more-action">

                                        <div class="dropdown">
                                            <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                <span class="visually-hidden">{{trans('Toggle Dropdown')}}</span>

                                                <i class="las la-chevron-circle-down "></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item seeDetails" href="javascript:void(0)"
                                                       data-title="@lang($item['title'])"
                                                       data-rules="@lang($item['rules'])"
                                                       data-invoice="{{$item['invoice']}}"
                                                       data-amount="@lang(getAmount($item['amount']))"
                                                       data-created_at="{{dateTime($item['created_at'])}}"
                                                       data-report="{{$item['report']}}"
                                                       data-invitee_fullname="{{$item['invitee']['fullname']}}"
                                                       data-invitee_email="{{$item['invitee']['email']}}"
                                                       data-invitee_username="{{$item['invitee']['username']}}"

                                                       data-charge="{{$item['charge']}}"
                                                       data-charge_bear="{{kebab2Title($item['charge_bear'])}}"
                                                       data-image="{{$item['image']}}"
                                                       data-file_location="{{$item['file_location']}}"


                                                       data-bs-toggle="modal"
                                                       data-bs-target="#detailsModal"
                                                    ><i class="la la-eye"></i> {{trans('Details')}}</a></li>

                                                @if($item['status'] == 0 && $item['joiner_id'] == auth()->id())

                                                    <li><a class="dropdown-item rejectModal" href="javascript:void(0)"
                                                           data-id="{{$item['id']}}"
                                                           data-route="{{route('user.escrowConfirmation',$item['id'])}}"
                                                           data-title="@lang($item['title'])"
                                                           data-rules="@lang($item['rules'])"
                                                           data-invoice="{{$item['invoice']}}"
                                                           data-amount="@lang(getAmount($item['amount']))"
                                                           data-created_at="{{dateTime($item['created_at'])}}"
                                                           data-invitee_fullname="{{$item['invitee']['fullname']}}"
                                                           data-invitee_email="{{$item['invitee']['email']}}"
                                                           data-invitee_username="{{$item['invitee']['username']}}"

                                                           data-charge="{{$item['charge']}}"
                                                           data-charge_bear="{{kebab2Title($item['charge_bear'])}}"
                                                           data-image="{{$item['image']}}"
                                                           data-file_location="{{$item['file_location']}}"

                                                           data-bs-toggle="modal"
                                                           data-bs-target="#rejectModal"
                                                        ><i class="las la-cog"></i> {{trans('Accept / Reject')}}</a>
                                                    </li>


                                                @elseif($item['status'] == 1 &&  $item['payment_status'] == 0)
                                                    @if($item['creator_id'] == auth()->id())
                                                        <li><a class="dropdown-item releaseModal"
                                                               href="javascript:void(0)"
                                                               data-id="{{$item['id']}}"
                                                               data-route="{{route('user.escrowRelease',$item['id'])}}"
                                                               data-title="@lang($item['title'])"
                                                               data-rules="@lang($item['rules'])"
                                                               data-invoice="{{$item['invoice']}}"
                                                               data-amount="@lang(getAmount($item['amount']))"
                                                               data-created_at="{{dateTime($item['created_at'])}}"
                                                               data-invitee_fullname="{{$item['invitee']['fullname']}}"
                                                               data-invitee_email="{{$item['invitee']['email']}}"
                                                               data-invitee_username="{{$item['invitee']['username']}}"


                                                               data-charge="{{$item['charge']}}"
                                                               data-charge_bear="{{kebab2Title($item['charge_bear'])}}"
                                                               data-image="{{$item['image']}}"
                                                               data-file_location="{{$item['file_location']}}"

                                                               data-bs-toggle="modal"
                                                               data-bs-target="#releaseModal"
                                                            ><i class="las la-hand-holding-usd"></i> {{trans('Release')}}
                                                            </a></li>
                                                    @endif

                                                    <li><a class="dropdown-item reportModal"
                                                           href="javascript:void(0)"
                                                           data-id="{{$item['id']}}"
                                                           data-route="{{route('user.escrowToReport',$item['id'])}}"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#reportModal">
                                                            <i class="lab la-hire-a-helper"></i> {{trans('Report')}}
                                                        </a></li>

                                                @elseif($item['status'] == 1 &&  $item['payment_status'] == 2)
                                                    <li><a class="dropdown-item" href="{{route('user.escrow.reports',$item['id'])}}"><i
                                                                class="las la-comments-dollar"></i> {{trans('Chat')}}
                                                        </a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="bets__item-thumb">
                                        <a href="javascript:void(0)" class="thumb"
                                           title="{{@$item['invitee']['profileName']}}">
                                            <img
                                                src="{{getFile(config('location.user.path').@$item['invitee']['image'])}}"
                                                alt="header">
                                        </a>
                                    </div>
                                </li>
                            @empty

                                <li class="bets__item position-relative">

                                    <div class="bets__item-content w-100">
                                        <h3 class="bets__item-title text-center"><a
                                                href="javascript:void(0)">{{trans('No Records Found')}}</h3>

                                    </div>

                                </li>


                            @endforelse
                        </ul>
                    </div>

                    <div class="mt-4">
                        {{ $myEscrow->appends($_GET)->links($theme.'partials.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>




    @push('loadModal')
        <!---Details--->
        <div id="detailsModal" class="modal fade " tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h6><span class="text--base">{{trans('Subject')}} :</span> <span class="escrow-title"></span>
                        </h6>
                        <p class="pt-20 "><span class="text--base">{{trans('Invoice Id')}} : </span> <span
                                class="escrow-invoice"></span></p>
                        <p><span class="text--base">{{trans('Amount')}} : </span> <span
                                class="badge bg-secondary escrow-amount"></span></p>

                        <p><span class="text--base">{{trans('Charge')}} : </span> <span
                                class="badge bg-danger charge"></span></p>

                        <p><span class="text--base">{{trans('Rules')}} : </span> <span class="escrow-rules"></span></p>
                        <p class="show-file"></p>

                        <p><span class="text--base pt-2">{{trans('Opponent Fullname')}} : </span> <span
                                class="invitor-fullname"></span></p>
                        <p><span class="text--base">{{trans('Opponent Email')}} : </span> <span
                                class="invitor-email"></span></p>
                        <p><span class="text--base">{{trans('Opponent Username')}} : </span> <span
                                class="invitor-username"></span></p>
                        <p><span class="text--base">{{trans('Invited At')}} : </span> <span class="invited-at"></span>
                        </p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark closeModal"
                                data-dismiss="modal">@lang('Close')</button>
                    </div>

                </div>
            </div>
        </div>

        <!---Action Or Reject--->
        <div id="rejectModal" class="modal fade " tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="post" class="escrowConfirmation">
                        @csrf
                        <div class="modal-body">
                            <h6><span class="text--base">{{trans('Subject')}} :</span> <span
                                    class="escrow-title"></span></h6>
                            <p class="pt-20 "><span class="text--base">{{trans('Invoice Id')}} : </span> <span
                                    class=" escrow-invoice"></span></p>
                            <p><span class="text--base">{{trans('Amount')}} : </span> <span class="badge bg-secondary escrow-amount"></span></p>

                            <p><span class="text--base">{{trans('Charge')}} : </span> <span class="badge bg-danger charge"></span></p>


                            <p class="show-file"></p>


                            <p><span class="text--base">{{trans('Rules')}} : </span> <span class="escrow-rules"></span>
                            </p>


                            <p class="show-file"></p>


                            <p><span class="text--base pt-2">{{trans('Opponent Fullname')}} : </span> <span
                                    class="invitor-fullname"></span></p>
                            <p><span class="text--base">{{trans('Opponent Email')}} : </span> <span
                                    class="invitor-email"></span></p>
                            <p><span class="text--base">{{trans('Opponent Username')}} : </span> <span
                                    class="invitor-username"></span></p>
                            <p><span class="text--base">{{trans('Invited At')}} : </span> <span
                                    class="invited-at"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="action" value="accept"
                                    class="btn btn-sm btn-success">@lang('Accept')</button>
                            <button type="submit" name="action" value="reject"
                                    class="btn btn-sm btn-danger">@lang('Reject')</button>
                            <button type="button" class="btn btn-sm btn-dark closeModal"
                                    data-dismiss="modal">@lang('Close')</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!---Release--->
        <div id="releaseModal" class="modal fade " tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="post" class="releaseConfirmation">
                        @csrf
                        <div class="modal-body">
                            <h6><span class="text--base">{{trans('Subject')}} :</span> <span
                                    class="escrow-title"></span></h6>
                            <p class="pt-20 "><span class="text--base">{{trans('Invoice Id')}} : </span> <span
                                    class=" escrow-invoice"></span></p>
                            <p><span class="text--base">{{trans('Amount')}} : </span> <span
                                    class="badge bg-secondary escrow-amount"></span></p>
                            <p><span class="text--base">{{trans('Rules')}} : </span> <span class="escrow-rules"></span>
                            </p>

                            <p class="show-file"></p>


                            <p><span class="text--base pt-2">{{trans('Opponent Fullname')}} : </span> <span
                                    class="invitor-fullname"></span></p>
                            <p><span class="text--base">{{trans('Opponent Email')}} : </span> <span
                                    class="invitor-email"></span></p>
                            <p><span class="text--base">{{trans('Opponent Username')}} : </span> <span
                                    class="invitor-username"></span></p>
                            <p><span class="text--base">{{trans('Invited At')}} : </span> <span
                                    class="invited-at"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="action" value="release"
                                    class="btn btn-sm btn-success">@lang('Release')</button>
                            <button type="button" class="btn btn-sm btn-dark closeModal"
                                    data-dismiss="modal">@lang('Close')</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!---Report--->
        <div id="reportModal" class="modal fade " tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="post" class="reportConfirmation">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>{{trans('Write your complain')}}</label>
                                <textarea name="report" id="report" class="form--control" rows="10" placeholder="{{trans('Type Here')}}">{{old('report')}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="action" value="report"
                                    class="btn btn-sm btn-success">@lang('Report')</button>
                            <button type="button" class="btn btn-sm btn-dark closeModal"
                                    data-dismiss="modal">@lang('Close')</button>
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
        var title, rules, amount, currency, created_at, report, inviteeFullname, inviteeEmail, inviteeUsername, invoice,  charge, charge_bear,image,file_location;

        $('.seeDetails').on('click', function () {
            currency = "{{trans(config('basic.currency'))}}";
            title = $(this).data('title');
            rules = $(this).data('rules');
            amount = $(this).data('amount');
            created_at = $(this).data('created_at');
            report = $(this).data('report');
            invoice = $(this).data('invoice');
            inviteeFullname = $(this).data('invitee_fullname');
            inviteeEmail = $(this).data('invitee_email');
            inviteeUsername = $(this).data('invitee_username')

            charge = $(this).data('charge');
            charge_bear = $(this).data('charge_bear');
            image = $(this).data('image');
            file_location = $(this).data('file_location');

            if(image == ''){
                $('.show-file').html(``);
            }else {
                $('.show-file').html(`<span class="text--base">{{trans('Documents')}} : </span> <a href="${file_location}" class="text-white">${image}</a>`)
            }

            $('.charge').text(`${charge} ${currency}`);
            $('.charge_bear').text(`${charge_bear}`);
            $('.image').text(`${image}`);
            $('.file_location').text(`${file_location}`);


            $('.method-name').text(`@lang('Details')`);
            $('.escrow-title').text(title);
            $('.escrow-invoice').text(invoice);
            $('.escrow-amount').text(`${amount} ${currency}`);


            $('.escrow-rules').text(rules);
            $('.invitor-fullname').text(inviteeFullname);
            $('.invitor-email').text(inviteeEmail);
            $('.invitor-username').text(inviteeUsername);
            $('.invited-at').text(created_at);

        });

        $('.rejectModal').on('click', function () {
            currency = "{{trans(config('basic.currency'))}}";
            title = $(this).data('title');
            rules = $(this).data('rules');
            amount = $(this).data('amount');
            created_at = $(this).data('created_at');
            report = $(this).data('report');
            invoice = $(this).data('invoice');


            charge = $(this).data('charge');
            charge_bear = $(this).data('charge_bear');
            image = $(this).data('image');
            file_location = $(this).data('file_location');

            if(image == ''){
                $('.show-file').html(``);
            }else {
                $('.show-file').html(`<span class="text--base">{{trans('Documents')}} : </span> <a href="${file_location}" class="text-white">${image}</a>`)
            }

            $('.charge').text(`${charge} ${currency}`);
            $('.charge_bear').text(`${charge_bear}`);
            $('.image').text(`${image}`);
            $('.file_location').text(`${file_location}`);


            inviteeFullname = $(this).data('invitee_fullname');
            inviteeEmail = $(this).data('invitee_email');
            inviteeUsername = $(this).data('invitee_username');

            $('.escrowConfirmation').attr('action', $(this).data('route'))


            $('.method-name').text(`@lang('Confirmation for action')`);
            $('.escrow-title').text(title);
            $('.escrow-amount').text(`${amount} ${currency}`);
            $('.escrow-rules').text(rules);
            $('.escrow-invoice').text(invoice);


            $('.invitor-fullname').text(inviteeFullname);
            $('.invitor-email').text(inviteeEmail);
            $('.invitor-username').text(inviteeUsername);
            $('.invited-at').text(created_at);
        });


        $('.releaseModal').on('click', function () {
            currency = "{{trans(config('basic.currency'))}}";
            title = $(this).data('title');
            rules = $(this).data('rules');
            amount = $(this).data('amount');
            created_at = $(this).data('created_at');
            report = $(this).data('report');
            invoice = $(this).data('invoice');


            charge = $(this).data('charge');
            charge_bear = $(this).data('charge_bear');
            image = $(this).data('image');
            file_location = $(this).data('file_location');

            if(image == ''){
                $('.show-file').html(``);
            }else {
                $('.show-file').html(`<span class="text--base">{{trans('Documents')}} : </span> <a href="${file_location}" class="text-white">${image}</a>`)
            }

            $('.charge').text(`${charge} ${currency}`);
            $('.charge_bear').text(`${charge_bear}`);
            $('.image').text(`${image}`);
            $('.file_location').text(`${file_location}`);


            inviteeFullname = $(this).data('invitee_fullname');
            inviteeEmail = $(this).data('invitee_email');
            inviteeUsername = $(this).data('invitee_username');

            $('.releaseConfirmation').attr('action', $(this).data('route'))


            $('.method-name').text(`@lang('Confirmation for release')`);
            $('.escrow-title').text(title);
            $('.escrow-amount').text(`${amount} ${currency}`);
            $('.escrow-rules').text(rules);
            $('.escrow-invoice').text(invoice);


            $('.invitor-fullname').text(inviteeFullname);
            $('.invitor-email').text(inviteeEmail);
            $('.invitor-username').text(inviteeUsername);
            $('.invited-at').text(created_at);
        });




        $('.reportModal').on('click', function () {
            $('.reportConfirmation').attr('action', $(this).data('route'))
            $('.method-name').text(`@lang('Report Now')`);
            $('textarea[name="report"]').val('')

        });


        $('.closeModal').on('click', function (e) {
            $("#detailsModal").modal("hide");
            $("#rejectModal").modal("hide");
            $("#releaseModal").modal("hide");
            $("#reportModal").modal("hide");
        });
    </script>

    @if($errors->any())
        <script>
            'use strict';
            @foreach ($errors->all() as $error)
            Notiflix.Notify.Failure(`{{trans($error)}}`);
            @endforeach
        </script>
    @endif
@endpush
