@extends($theme.'layouts.app')
@section('title', trans('FAQ'))

@section('content')

    @include($theme.'partials.banner')



    @if(isset($templates['faq'][0]) && $faq = $templates['faq'][0])



        <!--===About Section===-->
        <section class="faq-section pt-120 pb-120">
            <div class="container">
                <div class="section__title section__title-center">
                    <h3 class="section__title-title">@lang(@$faq->description->title)</h3>

                    <p class="section__title-txt">
                        @lang(@$faq->description->short_details)
                    </p>
                </div>
                <div class="row gx-xxl-5">
                    @if(isset($contentDetails['faq']))
                        <div class="col-lg-12">
                            <div class="faq-wrapper">
                                @foreach($contentDetails['faq'] as $k => $data)

                                        <div class="faq-item {{($loop->index == 0) ? 'open active':''}} ">
                                            <div class="faq-title">
                                                <h5 class="title">@lang(@$data->description->title)  </h5>
                                                <span class="plus"></span>
                                            </div>
                                            <div class="faq-content">
                                                <p>
                                                    @lang(@$data->description->description)
                                                </p>
                                            </div>
                                        </div>

                                @endforeach
                            </div>
                        </div>


                    @endif

                </div>
            </div>
        </section>
        <!--===About Section===-->

    @endif



@endsection
