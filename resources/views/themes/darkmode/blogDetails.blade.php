@extends($theme.'layouts.app')
@section('title',trans('Blog Details'))

@section('content')

    @include($theme.'partials.banner')


    <!-- BLOG -->
    <section id="blog" class="secbg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-blog card mb-3">
                        <div class="fig-container">
                            <img class="br-4 w-fill" src="{{$singleItem['image']}}" alt="{{$singleItem['title']}}">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-fill mt-15 mb-15">
                                <p class="text">{{trans('BY- Admin')}}</p>
                                <p class="text">{{$singleItem['date']}}</p>
                            </div>

                            <h5 class="h5 mb-15 mt-15">{{$singleItem['title']}}</h5>
                            <div class="paragraph mb-10">
                                @lang($singleItem['description'])
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="blog-sidebar secbg-2">

                        @if(isset($popularContentDetails['blog']))
                            <div class="sidebar-wrapper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                                <h6 class="h6 mb-20">{{trans('Recent Post')}}</h6>
                                <div class="recent-post">
                                    @foreach($popularContentDetails['blog']->sortDesc() as $data)
                                        <a class="media align-items-center" href="{{route('blogDetails',[slug($data->description->title), $data->content_id])}}">
                                            <div class="media-img">
                                                <img class="br-4" src="{{getFile(config('location.content.path').'thumb_'.@$data->content->contentMedia->description->image)}}"
                                                     alt="{{@$data->description->title}}">
                                            </div>
                                            <div class="media-body ml-15">
                                                <p class="text hover-text">{{\Str::limit($data->description->title,25)}}</p>
                                                <p class="text date-show">{{dateTime($data->created_at)}}</p>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /BLOG -->

@endsection
