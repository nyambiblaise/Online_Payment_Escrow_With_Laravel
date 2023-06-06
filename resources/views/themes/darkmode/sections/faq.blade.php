@if(isset($templates['faq'][0]) && $faq = $templates['faq'][0])



<!--===About Section===-->
<section class="faq-section pt-100 pb-100">
    <div class="container">
        <div class="section__title section__title-center">
            <span class="section__cate">@lang(@$faq->description->short_title)</span>
            <h3 class="section__title-title">@lang(@$faq->description->title)</h3>

            <p class="section__title-txt">
                @lang(@$faq->description->short_details)
            </p>
        </div>
        <div class="row gx-xxl-5">
            @if(isset($contentDetails['faq']))
            <div class="col-lg-6">
                <div class="faq-wrapper">
                    @foreach($contentDetails['faq'] as $k => $data)

                        @if($k%2 == 0)


                    <div class="faq-item {{($loop->index == 0) ? 'open active':''}} ">
                        <div class="faq-title">
                            <h5 class="title">@lang(@$data->description->title) </h5>
                                <span class="plus"></span>
                        </div>
                        <div class="faq-content">
                            <p>
                                @lang(@$data->description->description)
                            </p>
                        </div>
                    </div>
                        @endif

                    @endforeach
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-wrapper">

                    @foreach($contentDetails['faq'] as $k => $data)
                        @if($k%2 != 0)
                    <div class="faq-item {{($loop->index == 1) ? 'open active':''}}">
                        <div class="faq-title">
                            <h5 class="title">@lang(@$data->description->title) </h5>
                            <span class="plus"></span>
                        </div>
                        <div class="faq-content">
                            <p>
                                @lang(@$data->description->description)
                            </p>
                        </div>
                    </div>
                        @endif
                    @endforeach



                </div>
            </div>
            @endif

        </div>
    </div>
</section>
<!--===About Section===-->

@endif
