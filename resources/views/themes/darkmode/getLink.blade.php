@extends($theme.'layouts.app')
@section('title')
    @lang($title)
@endsection

@section('content')


    @include($theme.'partials.banner')



    <!--=======Privacy=======-->
    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-10">
                    <div class="privacy__item">
                        <p class="privacy__txt">
                            @lang(@$description)
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--=======Privacy=======-->


@endsection
