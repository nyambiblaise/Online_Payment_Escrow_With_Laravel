<!--   partner section start    -->
<div class="partner-section section-padding pt-120 pb-100 secbg-2 ">
    <div class="container">


        @if(isset($templates['we-accept'][0]) && $weAccept = $templates['we-accept'][0])
            <div class="section__title section__title-center">
                <span class="section__cate">@lang(@$weAccept->description->short_title)</span>
                <h3 class="section__title-title"> @lang(@$weAccept->description->title)</h3>

                <p class="section__title-txt">
                    @lang(@$weAccept->description->short_details)
                </p>
            </div>
        @endif

        <div class="row gap-4">
            <div class="col-md-12">
                <div class="partner-carousel  owl-carousel owl-theme">

                    @foreach($gateways as $gateway)
                        <div class="single-partner-item ">
                            <div class="outer-container">
                                <div class="inner-container">
                                    <img src="{{getFile(config('location.gateway.path').@$gateway->image)}}"
                                         alt="{{@$gateway->name}}">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--   partner section end    -->


