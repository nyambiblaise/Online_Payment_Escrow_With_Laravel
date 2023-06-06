@extends($theme.'layouts.app')
@section('title',trans('404'))


@section('content')

    @include($theme.'partials.banner')

    <section class="how-to-section  pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">{{trans('Opps!')}}</span>
                    <div class="mb-4 lead">{{trans('The page you are looking for was not found.')}}</div>
                    <a class="cmn-btn" href="{{url('/')}}" >@lang('Back To Home')</a>
                </div>
            </div>
        </div>
    </section>

@endsection
