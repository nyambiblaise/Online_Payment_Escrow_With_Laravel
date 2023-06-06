<!DOCTYPE html>
<html lang="en" @if(session()->get('rtl') == 1) dir="rtl" @endif >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.seo')
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/bootstrap.min.css')}}"/>
    @stack('css-lib')
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/nice-select.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/owl.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/main.css')}}"/>
    @stack('style')
</head>

<body>

<div class="loader">
    <div class="loader-inner">
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
    </div>
</div>


<audio id="myNotify">
    <source src="{{asset('assets/admin/css/notify.mp3')}}" type="audio/mpeg">
</audio>
<!--=======Header=======-->
<header>
    <div class="container">
        <div class="header__wrapper">
            <div class="left__side">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{getFile(config('location.logoIcon.path').'logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="right__side">
                <ul class="menu">
                    <li><a href="{{route('home')}}">@lang('Home')</a></li>

                    <li><a href="{{route('user.home')}}">@lang('Dashboard')</a></li>

                    <li>
                        <a href="javascript:void(0)">{{trans('Escrow')}}</a>
                        <ul class="submenu">
                            <li>
                                <a href="{{route('user.makeEscrow')}}">@lang('Make Escrow')</a>
                            </li>
                            <li>
                                <a href="{{route('user.myContactList')}}">{{trans('Add Your Contact')}}</a>
                            </li>
                            <li>
                                <a href="{{route('user.myEscrow')}}">{{trans('My Escrow')}}</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="{{menuActive(['user.transaction', 'user.transaction.search'])}}" href="{{route('user.transaction')}}">@lang('Transaction')</a>
                    </li>

                    <li>
                        <a href="javascript:void(0)">@lang('Fund')</a>
                        <ul class="submenu">
                            <li>
                                <a class="{{menuActive(['user.addFund', 'user.addFund.confirm'])}}" href="{{route('user.addFund')}}">@lang('Add Fund')</a>
                            </li>

                            <li>
                                <a class="{{menuActive(['user.fund-history', 'user.fund-history.search'])}}" href="{{route('user.fund-history')}}">@lang('Fund Log')</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)">@lang('Payout')</a>
                        <ul class="submenu">
                            <li>
                                <a class="{{menuActive(['user.payout.money','user.payout.preview'])}}" href="{{route('user.payout.money')}}">@lang('Payout Now')</a>
                            </li>
                            <li>
                                <a class="{{menuActive(['user.payout.history','payout.history.search'])}}" href="{{route('user.payout.history')}}">@lang('Payout Log')</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0)">{{trans('My Profile')}}</a>
                        <ul class="submenu">
                            <li>
                                <a class="{{menuActive(['user.profile'])}}" href="{{ route('user.profile') }}">@lang('Profile Settings')</a>
                            </li>

                            <li>
                                <a class="{{menuActive(['user.ticket.list', 'user.ticket.create', 'user.ticket.view'])}}"
                                   href="{{route('user.ticket.list')}}">@lang('Support Ticket')</a>
                            </li>

                            <li>
                                <a href="{{route('user.twostep.security')}}">@lang('2FA Security')</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{trans('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
                <div class="header-bar d-md-none me-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="account">

                <ul class="d-flex ml-20">
                    <li class="ml-20 push-notification " id="pushNotificationArea" >
                        <div class="dropdown account-dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0)"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="rotate-icon">
                                    <i class="lar la-bell"></i>
                                </span>
                                <span class="badge"  v-cloak>@{{items.length}}</span>
                            </a>
                            <div class="xs-dropdown-menu dropdown-menu dropdown-right">
                                <div class="dropdown-content scrolling-iv">

                                    <a v-for="(item, index) in items" @click.prevent="readAt(item.id, item.description.link)"  href="javascript:void(0)" class="dropdown-item">
                                        <div class="media align-items-center">
                                            <div class="media-icon">
                                                <i :class="item.description.icon" ></i>
                                            </div>
                                            <div class="media-body ml-15">
                                                <h6 class="font-weight-bold" v-cloak v-html="item.description.text"></h6>
                                                <p v-cloak>@{{ item.formatted_date }}</p>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="pt-15 pr-15 pb-15 pl-15 d-flex justify-content-center ">
                                    <a class="btn-viewnotification" href="javascript:void(0)" v-if="items.length == 0">@lang('You have no notifications')</a>
                                    <button class="btn-clear " type="button" v-if="items.length > 0" @click.prevent="readAll">@lang('Clear')</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                </div>


            </div>
        </div>
    </div>
</header>
<!--=======Header=======-->


@yield('content')


@include($theme.'partials.footer')


@stack('loadModal')



<script src="{{asset($themeTrue.'js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/popper.min.js')}}"></script>

<script src="{{asset($themeTrue.'js/bootstrap.min.js')}}"></script>
@stack('extra-js')
<script src="{{asset($themeTrue.'js/notiflix-aio-2.7.0.min.js')}}"></script>

<script src="{{asset($themeTrue.'js/nice-select.js')}}"></script>
<script src="{{asset($themeTrue.'js/owl.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/pusher.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/vue.min.js')}}"></script>
<script src="{{asset($themeTrue.'js/axios.min.js')}}"></script>

<script src="{{asset($themeTrue.'js/main.js')}}"></script>


@auth
    <script>
        'use strict';
        let pushNotificationArea = new Vue({
            el: "#pushNotificationArea",
            data: {
                items: [],
            },
            beforeMount() {
                this.getNotifications();
                this.pushNewItem();
            },
            methods: {
                getNotifications() {
                    let app = this;
                    axios.get("{{ route('user.push.notification.show') }}")
                        .then(function (res) {
                            console.log(res.data)
                            app.items = res.data;
                        })
                },
                readAt(id, link) {
                    let app = this;
                    let url = "{{ route('user.push.notification.readAt', 0) }}";
                    url = url.replace(/.$/, id);
                    axios.get(url)
                        .then(function (res) {
                            if (res.status) {
                                app.getNotifications();
                                if (link != '#') {
                                    window.location.href = link
                                }
                            }
                        })
                },
                readAll() {
                    let app = this;
                    let url = "{{ route('user.push.notification.readAll') }}";
                    axios.get(url)
                        .then(function (res) {
                            if (res.status) {
                                app.items = [];
                            }
                        })
                },
                pushNewItem() {
                    let app = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                        encrypted: true,
                        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                    });
                    let channel = pusher.subscribe('user-notification.' + "{{ Auth::id() }}");
                    channel.bind('App\\Events\\UserNotification', function (data) {
                        app.items.unshift(data.message);

                        var x = document.getElementById("myNotify");
                        x.play();

                    });
                    channel.bind('App\\Events\\UpdateUserNotification', function (data) {
                        app.getNotifications();
                    });
                }
            }
        });
    </script>
@endauth

@stack('script')
@if (session()->has('success'))
    <script>
        Notiflix.Notify.Success("@lang(session('success'))");
    </script>
@endif

@if (session()->has('error'))
    <script>
        Notiflix.Notify.Failure("@lang(session('error'))");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Notiflix.Notify.Warning("@lang(session('warning'))");
    </script>
@endif

<script>
    $(document).ready(function () {
        $(".language").find("select").change(function () {
            window.location.href = "{{route('language')}}/" + $(this).val()
        })
    })
</script>


</body>
</html>
