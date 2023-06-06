@extends($theme.'layouts.app')
@section('title',trans('Home'))

@section('content')

    @include($theme.'sections.slider')
    @include($theme.'sections.about-us')
    @include($theme.'sections.why-chose-us')

    @include($theme.'sections.how-it-work')
    @include($theme.'sections.testimonial')
    @include($theme.'sections.faq')
    @include($theme.'sections.we-accept')


@endsection
