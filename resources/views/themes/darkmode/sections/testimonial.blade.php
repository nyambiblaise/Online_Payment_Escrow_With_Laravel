@if(isset($templates['testimonial'][0]) && $testimonial = $templates['testimonial'][0])
    <!--=======Clients Say=======-->
    <section class="client-section pt-120 pb-120 section--bg">
        <div class="container">
            <div class="section__title section__title-center">
                <span class="section__cate">@lang(@$testimonial->description->short_title)</span>
                <h3 class="section__title-title"> @lang(@$testimonial->description->title)</h3>

                <p class="section__title-txt">
                    @lang(@$testimonial->description->description)
                </p>
            </div>
            <div class="client-slider owl-theme owl-carousel">
                @if(isset($contentDetails['testimonial']))
                    @foreach($contentDetails['testimonial'] as $key=>$data)
                        <div class="client__item">
                            <div class="client__author">
                                <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}"
                                     alt="client">
                                <h3 class="author__title">@lang(@$data->description->name)</h3>
                                <span class="author__meta">@lang(@$data->description->designation)</span>
                            </div>
                            <div class="client__desc">
                                <p class="client__desc">
                                    @lang(@$data->description->description)
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--=======Clients Say=======-->
@endif
