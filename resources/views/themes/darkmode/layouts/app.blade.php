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
    <link rel="stylesheet" type="text/css" href="{{asset($themeTrue.'css/all.min.css')}}"/>
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
                    <li>
                        <a href="{{route('home')}}">@lang('Home')</a>
                    </li>
                    <li>
                        <a href="{{route('about')}}"> @lang('About Us')</a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}">@lang('Blog')</a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">@lang('Contact')</a>
                    </li>

                    @guest
                    <li>
                        <a href="{{route('login')}}">{{trans('Sign In')}}</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}">{{trans('Sign Up')}}</a>
                    </li>
                    @endguest

                    @auth
                    <li>
                        <a href="javascript:void(0)">{{trans('My Profile')}}</a>
                        <ul class="submenu">
                            <li>
                                <a class="{{menuActive(['user.home'])}}" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                            </li>

                            <li>
                                <a class="{{menuActive(['user.profile'])}}" href="{{ route('user.profile') }}">@lang('Profile Settings')</a>
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
                    @endauth



                </ul>
                <div class="header-bar d-md-none me-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <select class="select-bar language">
                    @foreach($languages as $language)
                    <option value="{{strtoupper($language->short_name)}}">@lang($language->name)</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
</header>
<!--=======Header=======-->




@yield('content')


@include($theme.'partials.footer')


<script src="{{asset($themeTrue.'js/jquery-3.6.0.min.js')}}"></script>
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
        $(".language").on('change', function (){
            window.location.href = "{{route('language')}}/" + $(this).val()
        })
    })
</script>


</body>
</html>
