@extends($theme.'layouts.app')
@section('title',trans('403 Forbidden'))


@section('content')

    @include($theme.'partials.banner')
    <section class="how-to-section  pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">@lang('403 Forbidden')</span>
                    <div class="mb-4 lead">@lang("You don’t have permission to access ‘/’ on this server.")</div>
                    <a class="cmn-btn" href="{{url('/')}}" >@lang('Back To Home')</a>
                </div>
            </div>
        </div>
    </section>




@endsection
