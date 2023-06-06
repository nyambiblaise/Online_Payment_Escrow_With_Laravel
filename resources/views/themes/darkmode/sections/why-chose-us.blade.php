

@if(isset($templates['why-chose-us'][0]) && $whyChoseUs = $templates['why-chose-us'][0])

    <!--=======Feature=======-->
    <section class="feature-section pt-120 pb-120 secbg-2">
        <div class="container">
            <div class="section__title section__title-center">
                <span class="section__cate">@lang(@$whyChoseUs->description->short_title)</span>
                <h3 class="section__title-title"> @lang(@$whyChoseUs->description->title)</h3>

                <p class="section__title-txt">
                    @lang(@$whyChoseUs->description->description)
                </p>
            </div>

            @if(isset($contentDetails['why-chose-us'] ))
            <div class="featured-area">
                <div class="row g-0">
                    @foreach($contentDetails['why-chose-us'] as $item)
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="feature__item">
                            <div class="feature__item-icon">
                                <img
                                    src="{{getFile(config('location.content.path').@$item->content->contentMedia->description->image)}}"
                                    alt="...">
                            </div>
                            <h5 class="feature__item-title">@lang(@$item->description->title)</h5>
                            <p>@lang(@$item->description->information)</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>
    <!--=======Feature=======-->



@endif

