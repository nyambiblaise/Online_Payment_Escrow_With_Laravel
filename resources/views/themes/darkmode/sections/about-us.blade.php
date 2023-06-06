@if(isset($templates['about-us'][0]) && $aboutUs = $templates['about-us'][0])

    <!--=======About=======-->
    <section class="about-section pt-100 pb-100">
        <div class="container">
            <div class="row flex-wrap-reverse gy-4">
                <div class="col-lg-6 pe-xl-5 wow fadeInRight" data-wow-duration="1s">
                    <div class="about--thumb h-100">
                        <iframe src="{{@$aboutUs->templateMedia()->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1s">
                    <div class="section__title">
                        <span class="section__cate">@lang(@$aboutUs->description->short_title)</span>
                        <h3 class="section__title-title">@lang(@$aboutUs->description->title)</h3>
                    </div>
                    <p>
                        @lang(@$aboutUs->description->short_description)
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--=======About=======-->
@endif


