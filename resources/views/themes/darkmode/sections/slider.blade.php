@if(isset($contentDetails['slider']))
    <!--===Banner===-->
<div class="overflow-hidden">
    <section class="banner-section position-relative">
        <div class="slide1 owl-carousel owl-theme">
            @foreach($contentDetails['slider']->take(5) as $data)
            <div class="banner__item bg_img" data-background="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}">
                <div class="banner__content">
                    <div class="w-100 banner__content-content">
                        <div class="w-100">
                            <h2 class="banner__title">@lang(@$data->description->title)</h2>
                            <h5 class="banner__subtitle">
                                <span class="d-block">@lang(@$data->description->sub_title)</span>
                            </h5>
                            <p>
                                @lang(@$data->description->details)
                            </p>
                        </div>
                    </div>
                    <div class="w-100">
                        <a href="{{@$data->content->contentMedia->description->button_link}}" class="sign-in-btn">
                            <div class="left">
                                <h6 class="btn-title">@lang(@$data->description->button_name)</h6>
                            </div>
                            <div class="right">
                                <span>@lang(@$data->description->button_note)</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="banner__thumbs__wrapper">
            <div class="slide2 owl-carousel owl-theme">
                @foreach($contentDetails['slider']->take(5) as $data)

                <div class="banner__thumbnails">
                    <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}" alt="banner">
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<!--===Banner===-->
@endif

