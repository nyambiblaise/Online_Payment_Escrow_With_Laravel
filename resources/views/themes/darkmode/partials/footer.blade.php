<!-- Footer Section -->
<footer class="footer-section position-relative overflow-hidden" id="subscribe">
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="container">
        <div class="pt-100 pb-100">
            <div class="row gy-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="text-start footer-about">
                        <div class="footer-logo mb-25 ms-0">
                            <a href="{{route('home')}}">
                                <img src="{{getFile(config('location.logoIcon.path').'logo.png')}}" alt="footer">
                            </a>
                        </div>

                        @if(isset($contactUs['contact-us']) &&  $contactData =  $contactUs['contact-us'][0])
                        <p class="mt-3">{{@$contactData->description->footer_left_text}}</p>
                        @endif


                        @if(isset($contentDetails['social']))
                            <ul class="social-icons-2 mt-3">
                                @foreach($contentDetails['social'] as $data)
                                    <li>
                                        <a href="{{@$data->content->contentMedia->description->link}}" title="">
                                            <i class="{{@$data->content->contentMedia->description->icon}}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="text-start footer-widget social-border-color-1">
                        <h6 class="footer__title text-white">{{trans('About Company')}}</h6>
                        <ul class="footer__links">
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
                                <a href="{{route('faq')}}">@lang('FAQ')</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="text-start footer-widget social-border-color-1">
                        <h6 class="footer__title text-white">{{trans('Useful Links')}}</h6>
                        <ul class="footer__links">
                            <li>
                                <a href="{{route('contact')}}">@lang('Contact')</a>
                            </li>

                        @isset($contentDetails['support'])
                                @foreach($contentDetails['support'] as $data)
                                    <li>
                                        <a href="{{route('getLink', [slug($data->description->title), $data->content_id])}}">@lang($data->description->title)</a>
                                    </li>
                                @endforeach
                            @endisset


                        </ul>
                    </div>
                </div>
                @if(isset($contactUs['news-letter']) && $newsLetter = $contactUs['news-letter'][0])


                    <div class="col-lg-3 col-sm-6">
                        <div class="text-start footer-widget text-light">
                            <h6 class="footer__title text-white">@lang(@$newsLetter->description->title)</h6>
                            <p>

                                @lang(@$newsLetter->description->sub_title)
                            </p>
                            <form class="subscribe-form mt-3" action="{{route('subscribe')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="email" class="form-control form--control section--bg" name="email"
                                           placeholder="@lang('Email Address')">
                                </div>
                                <button class="cmn-btn" type="submit">{{trans('Subscribe')}}</button>
                            </form>

                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom text-white">
        <div class="container">
            <div class="row justify-content-center g-2">
                <div class="col-lg-6">
                    <div class="copyright text-center">
                        {{trans('Copyright')}} &copy; {{date('Y')}} <a href="{{route('home')}}" class="text-white fw--semibold text-decoration-none">{{$basic->site_title}}</a> {{trans('All Right Reserved.')}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section -->

