@extends($theme.'layouts.user')
@section('title',__($page_title))

@section('content')
    @include($theme.'partials.banner')

    <section class="privacy pt-100 pb-100 section--bg overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card secbg">
                        <div class="card-body">
                                <form class="form-row" action="{{route('user.ticket.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12">
                                        <div class="input--group mb-2">
                                            <label>@lang('Subject')</label>
                                            <input class="form-control" type="text" name="subject"
                                                   value="{{old('subject')}}" placeholder="@lang('Enter Subject')">
                                            @error('subject')
                                            <span class="error text-danger">@lang($message) </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input--group mb-2">
                                            <label>@lang('Message')</label>
                                            <textarea class="form-control ticket-box" name="message" rows="5"
                                                      id="textarea1"
                                                      placeholder="@lang('Enter Message')">{{old('message')}}</textarea>
                                            @error('message')
                                            <span class="error text-danger">@lang($message) </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <input type="file" name="attachments[]"
                                                   class="form-control "
                                                   multiple
                                                   placeholder="@lang('Upload File')">

                                            @error('attachments')
                                            <span class="text-danger">{{trans($message)}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="input--group mt-3">
                                            <button type="submit" class="cmn-btn w-100">
                                                <span>@lang('Submit')</span></button>

                                        </div>
                                    </div>


                                </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
