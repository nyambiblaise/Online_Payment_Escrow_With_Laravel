@if(isset($templates['how-it-work'][0]) && $howItWork = $templates['how-it-work'][0])
    <!--===How Section===-->
    <section class="how-to-section  pt-120 pb-120">
        <div class="container">
            <div class="section__title section__title-center">
                <span class="section__cate">@lang(@$howItWork->description->short_title)</span>
                <h3 class="section__title-title">@lang(@$howItWork->description->title)</h3>
                <p class="section__title-txt">
                    @lang(@$howItWork->description->description)
                </p>
            </div>

            <div class="row justify-content-center gy-4">
                @if(isset($contentDetails['how-it-work']))
                    @foreach($contentDetails['how-it-work'] as $k => $data)

                        <div class="col-lg-3 col-sm-6">
                            <div class="how__box">
                                <div class="how__img">
                                    <img src="{{getFile(config('location.content.path').@$data->content->contentMedia->description->image)}}" alt="how">
                                </div>
                                <div class="how__cont">
                                    <h6 class="title"> @lang(@$data->description->title)</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--===How Section===-->
@endif

