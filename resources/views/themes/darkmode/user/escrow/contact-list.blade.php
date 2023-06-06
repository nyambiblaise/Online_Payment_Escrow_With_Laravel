@extends($theme.'layouts.user')
@section('title',trans('Contact List'))

@section('content')
    @include($theme.'partials.banner')


    <section class="account-section overflow-hidden">
        <div class="container">
            <div class="cmn__card betting--card mw-750">
                <div class="card__body">
                    <div class="bet__wrapper">
                        <div class="pick__area">
                            <h6 class="pick__title">{{trans('Add Contact for future transaction')}}</h6>
                            <form class="add-people-form">
                                <div class="form-group text-start">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="la la-user"></i>
                                    </span>
                                        <input type="text" class="form--control form-control shadow-none outline-0"
                                               name="search" placeholder="{{trans('Username, Email or Phone')}}">
                                        <button
                                            class="input-group-text cmn-btn px-3 bg--theme bg-success text-white border-0 fs-14 checkContactList"
                                            type="button">{{trans('Add People')}}
                                        </button>


                                    </div>
                                    <span class="text-danger errors ps-5"></span>
                                </div>
                            </form>

                            <div class="oponent__wrapper">
                                <h6 class="oponent__title mb-2">{{trans('Most Recent Opponents')}}</h6>
                                <ul>
                                    @forelse($contactList as $item)
                                        @if(isset($item) && $item == false)
                                            @continue
                                        @endif
                                        <li class="oponent-item">
                                            <div class="thumb">
                                                <a href="javascript:void(0)">
                                                    <img src="{{getFile(config('location.user.path').@$item['info']['image'])}}" alt="user">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="oponent-title">
                                                    <a href="javascript:void(0)">
                                                        @lang(@$item['info']['fullname'])
                                                    </a>
                                                </h6>
                                                <span>@lang(@$item['info']['profileName'])</span>
                                            </div>


                                            @if($item['receiver_id'] == auth()->id() && $item['status'] ==0)
                                            <a href="{{route('user.acceptRequest',$item['id'])}}" title="{{trans('Accept Request')}}" class="add-btn bg-success "><i class="las la-check-circle"></i></a>
                                            <a href="{{route('user.rejectRequest',$item['id'])}}" title="{{trans('Cancel Request')}}" class="add-btn bg-info"><i class="las la-times"></i></a>
                                            @elseif($item['user_id'] == auth()->id() && $item['status'] ==0)
                                                <a href="javascript:void(0)" title="{{trans('Request Pending')}}" class="add-btn bg-warning pointer"><i class="las la-spinner"></i></a>
                                            @elseif($item['modified_by'] == auth()->id() && $item['status'] ==2)
                                                <a href="{{route('user.unblockConnection',$item['id'])}}" title="{{trans('Unblock')}}" class="add-btn bg-primary "><i class="las la-unlock"></i></a>
                                            @elseif($item['status'] == 1)
                                                <a href="{{route('user.blockConnection',$item['id'])}}" title="{{trans('Blocked')}}" class="add-btn bg-danger"><i class="las la-ban"></i></a>
                                            @endif
                                        </li>
                                    @empty
                                        <li class="oponent-item">
                                            <div class="thumb">
                                                <a href="javascript:void(0)">
                                                </a>
                                            </div>

                                            <div class="content">
                                                <h6 class="oponent-title">
                                                    <p>@lang('No contact in your list')</p>
                                                </h6>
                                            </div>
                                        </li>
                                    @endforelse
                                </ul>

                                <div class="mt-3">
                                    {{ $contactList->appends($_GET)->links($theme.'partials.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')
    <script>


        $(document).ready(function () {
            "use strict";
            $('input[name=search]').on('keypress', function () {
                $(this).parents('.add-people-form').find('.text-danger').addClass('d-none').removeClass('d-block');
            })


            $('.checkContactList').on('click', function () {
                var search = $('input[name=search]').val();
                if (search.length == 0) {
                    Notiflix.Notify.Warning(`{{trans('Please fill up the feild')}}`);
                    return 0;
                }

                $.ajax({
                    url: "{{route('user.checkContact')}}",
                    type: 'POST',
                    data: {
                        search
                    },
                    success(data) {
                        if (data.success) {
                            $('input[name=search]').val('');
                            $('input[name=search]').parents('.add-people-form').find('.text-danger').addClass('d-block').removeClass('d-none');
                            Notiflix.Notify.Success(`${data.success}`);
                        }
                    },
                    complete: function () {
                    },
                    error(err) {
                        var errors = err.responseJSON;
                        for (var obj in errors) {
                            $('.errors').text(`${errors[obj]}`)
                        }
                        $('input[name=search]').parents('.add-people-form').find('.text-danger').addClass('d-block').removeClass('d-none');
                    }
                });


            })


        });
    </script>
@endpush
