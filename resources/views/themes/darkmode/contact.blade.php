@extends($theme.'layouts.app')
@section('title',trans($title))

@section('content')

    @include($theme.'partials.banner')



    <!--=======Contact=======-->
    <section class="contact-section pt-120 pb-120 section--bg overflow-hidden">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="col-lg-7 pt-60">
                    <div class="section__title">
                        <span class="section__cate">@lang(@$contact->short_title)</span>
                        <h3 class="section__title-title">@lang(@$contact->title)</h3>
                        <p class="section__title-txt">
                            @lang(@$contact->short_details)
                        </p>
                    </div>

                    <form class="row" action="{{route('contact.send')}}" method="post">
                        @csrf
                        <div class="form-group col-sm-6">
                            <label for="name" class="form-label mt-2">{{trans('Your Name')}} :</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class=" form--control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label mt-2">{{trans('Your Email')}} :</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class=" form--control">

                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="subject" class="form-label mt-2">{{trans('Your Subject')}} :</label>
                            <input type="text" name="subject"  value="{{old('subject')}}" id="subject" class="form--control">

                            @error('subject')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="message" class="form-label mt-2">@lang('Message') :</label>
                            <textarea name="message" id="message"  class=" form--control">{{old('message')}} </textarea>
                            @error('message')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 m-0 mt-2">
                            <button type="submit" class="cmn-btn rounded border-0">{{trans('Send Message')}}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="contact-thumb">
                        <img src="{{getFile(config('location.content.path').@$contactImage)}}" alt="contact">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Contact=======-->


@endsection
