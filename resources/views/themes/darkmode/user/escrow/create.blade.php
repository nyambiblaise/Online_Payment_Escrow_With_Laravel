@extends($theme.'layouts.user')
@section('title',trans('Make Escrow'))

@section('content')
    @include($theme.'partials.banner')


    <section class="account-section overflow-hidden">
        <div class="container">
            <div class="cmn__card betting--card mw-750">
                <div class="card__body">

                    <div class="stepwizar d-flex justify-content-center">
                        <ul class="setup-panel steps__list">
                            <li class="stepwizard-step ">
                                <a href="#step-1" type="button" class="tab-success pl-15"
                                   >{{trans('Step 1')}}</a>
                            </li>
                            <li class="stepwizard-step">
                                <a href="#step-2" type="button" class="tab-default"
                                   disabled="disabled"> {{trans('Step 2')}}</a>
                            </li>
                            <li class="stepwizard-step">
                                <a href="#step-3" type="button" class="tab-default"
                                   disabled="disabled"> {{trans('Step 3')}}</a>
                            </li>
                            <li class="stepwizard-step">
                                <a href="#step-4" type="button" class="tab-default"
                                   disabled="disabled"> {{trans('Step 4')}}</a>
                            </li>

                        </ul>


                    </div>

                    <form role="form" id="submitForm" method="post" action="{{route('user.saveEscrow')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="step__wrapper setup-content" id="step-1">
                            <h5 class="title text-center">@lang('Job / Deal Title')</h5>
                            <div class="mb-3 form-group">
                                <input type="text" name="title" value="{{old('title')}}" class="form-control form--control"
                                       placeholder="{{trans('Title')}}" required="required">
                            </div>
                            <div class="step__buttons">
                                <button class="cmn-btn nextBtn " type="button">{{trans('Next')}} <i
                                        class="las la-angle-right"></i></button>
                            </div>
                        </div>

                        <div class="step__wrapper setup-content" id="step-2">
                            <h5 class="title text-center">@lang('Explain Rules for deal')</h5>
                            <div class="mb-3 form-group">
		                        <textarea name="rules" id="rules" rows="5"
                                          class="form-control form--control rounded p-4"
                                          required="required"
                                          placeholder="@lang('Type Here')">{{old('rules')}}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="ms-2">{{trans('Upload Documents')}} ({{trans('If any')}})</label>
                                <div class="input--group">
                                    <input type="file" name="image"
                                           placeholder="@lang('Upload File')">
                                    @error('image')
                                    <span class="text-danger">{{trans($message)}}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="step__buttons">
                                <button class="cmn-btn prevBtn white" type="button"><i
                                        class="las la-angle-left"></i>{{trans('Previous')}} </button>

                                <button class="cmn-btn nextBtn " type="button">{{trans('Next')}} <i
                                        class="las la-angle-right"></i></button>
                            </div>
                        </div>

                        <div class="step__wrapper setup-content" id="step-3">
                            <h5 class="title text-center">@lang('How much for deal?')</h5>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control form--control" name="amount" value="{{old('amount')}}"
                                           onkeypress="return isNumber(event)"
                                           placeholder="{{trans('Enter Amount')}}"
                                           required="required"/>
                                    <span class="input-group-text show-currency">{{trans($basic->currency)}}</span>
                                </div>
                                <p class="text-info mt-15">{{trans('Transaction Limit')}} :  {{getAmount($basic->minimum_escrow)}} - {{getAmount($basic->maximum_escrow)}} {{trans($basic->currency)}}</p>


                                <pre class="text-danger errors text-start ps-5"></pre>
                            </div>
                            <div class="form-group mb-3">
                                <label >{{trans('Charge Will bear')}} <code>({{getAmount($basic->escrow_charge)}}{{trans('% Charge Apply')}})</code></label>

                                <div class="d-flex form-check-input-font">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="charge_bear" type="radio" id="charge_bear1" value="invitor" checked>
                                        <label class="form-check-label"  for="charge_bear1">{{trans('Me')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="charge_bear" type="radio" id="charge_bear2" value="invitee">
                                        <label class="form-check-label" for="charge_bear2">{{trans('Opponent')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="charge_bear" type="radio" id="charge_bear3" value="both" >
                                        <label class="form-check-label" for="charge_bear3">{{trans('Both')}} </label>
                                    </div>
                                </div>
                            </div>


                            <div class="step__buttons">
                                <button class="cmn-btn prevBtn white" type="button"><i
                                        class="las la-angle-left"></i>{{trans('Previous')}} </button>
                                <button class="cmn-btn nextBtn " type="button">{{trans('Next')}} <i
                                        class="las la-angle-right"></i></button>
                            </div>
                        </div>


                        <div class="step__wrapper setup-content" id="step-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="title text-center">@lang('Invite a opponent')</h5>
                                <a href="{{route('user.myContactList')}}" class="add-btn bg-success"
                                   title="{{trans('Add Contact')}}"><i class="las la-plus"></i></a>
                            </div>

                            <div class="mt-2 mb-3 form-group">
                                <div class="stake__opponent owl-theme owl-carousel">
                                    @foreach($contactList as $item)
                                        @if(isset($item) && $item == false)
                                            @continue
                                        @endif
                                        <a href="javascript:void(0)" class="stake__opponent__item"
                                           data-id="{{$item['id']}}">
                                            <img src="{{getFile(config('location.user.path').@$item['info']['image'])}}"
                                                 alt="{{@$item['info']['fullname']}}"
                                                 title="{{@$item['info']['profileName']}}">
                                        </a>
                                    @endforeach
                                </div>


                                <input type="hidden" name="opponent" value="{{old('opponent')}}" >
                            </div>
                            <div class="step__buttons">
                                <button class="cmn-btn prevBtn white" type="button"><i
                                        class="las la-angle-left"></i>{{trans('Previous')}} </button>
                                <button class="cmn-btn nextBtn submit" type="button">{{trans('Submit')}} </button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')
    <script>
        "use strict";

        $(document).ready(function () {
            var navListItems = $('ul.setup-panel li a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');
            allWells.hide();

            navListItems.on('click', function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);
                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('tab-success').addClass('tab-default');
                    navListItems.parent().removeClass('active');
                    $item.addClass('tab-success');
                    $item.parent().addClass('active');
                    allWells.hide();
                    $target.show();
                    $target.find('.form--control:eq(0)').focus();
                }
            });
            allPrevBtn.on('click', function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('ul.setup-panel li a[href="#' + curStepBtn + '"]').parent().prev().children("a");
                prevStepWizard.removeAttr('disabled').trigger('click');
            });
            allNextBtn.on('click', function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('ul.setup-panel li a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find(".form--control"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('ul.setup-panel li a.tab-success').trigger('click');
        });


        var opponent = null;
        $(document).on('click', '.stake__opponent__item', function () {
            opponent = $(this).data('id');
            $(".stake__opponent__item").removeClass('opponent_select')
            $(this).addClass('opponent_select');
            $('input[name=opponent]').val(opponent)
        })

        function isNumber(evt) {

            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }

            return true;
        }



        $(document).on('click', '.submit', function () {

            var title = $('input[name=title]').val(),
                rules = $('textarea[name=rules]').val(),
                amount = $('input[name=amount]').val(),
                charge_bear = $(':radio[name="charge_bear"]').filter(':checked').val();
            console.log(charge_bear)

            var dss=  $('input[name=opponent]').val();

            if (title.length == 0) {
                Notiflix.Notify.Info(`{{trans('Please enter job title.')}}`);
                return 0;
            }
            if (rules.length == 0) {
                Notiflix.Notify.Info(`{{trans('Please explain to Explain Rules')}}`);
                return 0;
            }

            if ($.isNumeric(amount) == false) {
                Notiflix.Notify.Info(`{{trans('Please enter a valid amount for job')}}`);
                return 0;
            }
            if (opponent == null) {
                Notiflix.Notify.Info(`{{trans('Please select your opponent for invite.')}}`);
                return 0;
            }
            $("#submitForm").submit();

        });

    </script>


    @if($errors->any())
        <script>
            'use strict';
            @foreach ($errors->all() as $error)
            Notiflix.Notify.Failure(`{{trans($error)}}`);
            @endforeach
        </script>
    @endif


@endpush
