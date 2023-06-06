@extends($theme.'layouts.app')
@section('title', trans($title))

@section('content')

    @include($theme.'partials.banner')

    <!-- BLOG -->
    <section id="blog" class="secbg-2">
        <div class="container">
            @if(isset($templates['blog'][0]) && $blog = $templates['blog'][0])
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="heading-container">
                            <h6 class="topheading">@lang(@$blog->description->title)</h6>
                            <h3 class="heading">@lang(@$blog->description->sub_title)</h3>
                            <p class="slogan">@lang(@$blog->description->short_title)</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($contentDetails['blog']))
            <div class="blog-wrapper">
                <div class="row">
                    @foreach($contentDetails['blog'] as $data)
                        <div class="col-md-6 col-lg-4">
                            <a class="card-blog card wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.15s"
                               href="{{route('blogDetails',[slug(@$data->description->title), $data->content_id])}}">
                                <div class="fig-container">
                                    <img
                                        src="{{getFile(config('location.content.path').'thumb_'.@$data->content->contentMedia->description->image)}}"
                                        alt="Image Missing">
                                </div>
                                <h5 class="h5 my-4">{{\Illuminate\Support\Str::limit(@$data->description->title,25)}}</h5>
                                <p class="text  mt-0 p-16">
                                    {{Illuminate\Support\Str::limit(strip_tags(@$data->description->description),120)}}
                                </p>
                                <div class="date-wrapper colorbg-1">
                                    <h4 class="font-weight-medium fontubonto">{{dateTime(@$data->created_at,'d')}}</h4>
                                    <h4 class="font-weight-medium fontubonto">{{dateTime(@$data->created_at,'M')}}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- /BLOG -->

@endsection
