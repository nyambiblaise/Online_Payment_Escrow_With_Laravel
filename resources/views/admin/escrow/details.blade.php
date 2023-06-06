@extends('admin.layouts.app')
@section('title',trans($title))
@section('content')


    <div class="m-0 m-md-4 my-4 m-md-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body bg-white d-flex justify-content-between flex-wrap">
                        <h5><span
                                class="text--base pr-3">{{trans('Title')}} :</span> {{trans($escrow->title)}}
                        </h5>

                        @if($escrow->payment_status ==2)
                        <div>
                            <a href="javascript:void(0)"
                               data-toggle="modal" data-target="#payModal"
                               data-route="{{route('admin.escrow.resolve',$escrow->id)}}"
                               data-user_id="{{$escrow->creator_id}}"
                               data-username="{{optional($escrow->user)->username}}"
                               data-id="{{$escrow->id}}"
                               class="btn btn-rounded btn-success btn-sm px-3 payModal">{{trans('Pay To')}}  @lang(optional($escrow->user)->username)</a>


                            <a href="javascript:void(0)"
                               data-toggle="modal" data-target="#payModal"
                               data-route="{{route('admin.escrow.resolve',$escrow->id)}}"
                               data-user_id="{{$escrow->joiner_id}}"
                               data-username="{{optional($escrow->invitee)->username}}"
                               data-id="{{$escrow->id}}"

                               class="btn btn-rounded btn-primary btn-sm px-3 payModal">{{trans('Pay To')}}  @lang(optional($escrow->invitee)->username)</a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="  {{(in_array($escrow['payment_status'],[2,3])) ? 'col-lg-7' : 'col-lg-12'}} ">
                <div class="card shadow">
                    <div class="card-body">
                        <article>
                            <div class="post-details ">
                                <div class="post-inner">

                                    <div class="post-content">

                                        <div class="entry-content pl-0">
                                            <p class="mb-3">
                                                <span class="text--base pr-3">{{trans('Invoice ID')}} :</span>
                                                {{$escrow->invoice}}
                                            </p>
                                            <p class="mb-3">
                                                <span class="text--base pr-3">{{trans('Amount')}} :</span>
                                                 {{trans(config('basic.currency_symbol'))}}{{getAmount($escrow->amount)}}
                                            </p>
                                            <p class="mb-3">
                                                <span class="text--base pr-3">{{trans('Charge')}} :</span>
                                                 {{trans(config('basic.currency_symbol'))}}{{getAmount($charge)}}
                                            </p>
                                            <p class="mb-3">
                                                <span class="text--base pr-3">{{trans('Charge Will Bear')}} :</span>
                                                 <span class="font-weight-bold">{{trans(kebab2Title($escrow->charge_bear))}}</span>
                                            </p>

                                            <p class="mb-4">
                                                <span class="text--base pr-3">{{trans('Status')}} :</span>
                                                @if($escrow['status'] == 0)
                                                    <span
                                                        class="badge badge-pill badge-secondary">{{trans('Pending')}}</span>
                                                @elseif($escrow['status'] == 2)
                                                    <span
                                                        class="badge badge-pill badge-danger">{{trans('Rejected')}}</span>
                                                @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 0)
                                                    <span class="badge badge-pill badge-info">{{trans('Hold')}}</span>
                                                @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 1)
                                                    <span
                                                        class="badge badge-pill badge-success">{{trans('Completed')}}</span>
                                                @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 2)
                                                    <span
                                                        class="badge badge-pill badge-warning">{{trans('Disputed')}}</span>
                                                @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 3)
                                                    <span
                                                        class="badge badge-pill badge-primary">{{trans('Resolved by Admin')}}</span>
                                                @endif
                                            </p>

                                            @if($escrow['status'] == 1 && $escrow['payment_status'] == 3)
                                            <p class="mb-4">
                                                <span class="text--base pr-3">{{trans('Justice Favor')}} :</span>
                                                <a href="{{route('admin.user-edit',$escrow->favor_id)}}"
                                                   target="_blank">
                                                    {{optional($escrow->favor)->username}}
                                                </a>
                                            </p>
                                            @endif


                                            @if($escrow->report)
                                                <p class="mb-3 mt-2">
                                                    <span class="text--base pr-3">{{trans('Report')}} :</span>
                                                    @lang($escrow->report)</p>
                                                <p class="mb-4">
                                                    <span class="text--base pr-3">{{trans('Reported By')}} :</span>
                                                    <a href="{{route('admin.user-edit',$escrow->reported_by)}}"
                                                       target="_blank">
                                                        {{optional($escrow->reporter)->username}}
                                                    </a>
                                                </p>
                                            @endif

                                            <p class="mb-5"><span
                                                    class="text--base pr-3">{{trans('Rules')}} :</span> @lang($escrow->rules)
                                            </p>


                                            @if($escrow->image)
                                                <p class="mb-4 d-flex">
                                                    <span class="text--base pr-3">{{trans('Documents')}} :</span>
                                                    <a href="{{$file_location}}" >{{$escrow->image}}</a>
                                                </p>
                                            @endif



                                            <table class="table table-bordered shadow-sm">
                                                <thead class="thead-dark">
                                                <th scope="col">{{trans('Information')}}</th>
                                                <th scope="col">{{trans('Host')}}</th>
                                                <th scope="col">{{trans('Guest')}}</th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{trans('Username')}}</td>
                                                    <td>
                                                        <a href="{{route('admin.user-edit',$escrow->creator_id)}}"
                                                           target="_blank">
                                                            @lang(optional($escrow->user)->username)
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.user-edit',$escrow->joiner_id)}}"
                                                           target="_blank">
                                                            @lang(optional($escrow->invitee)->username)
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{trans('Fullname')}}</td>
                                                    <td>
                                                        @lang(optional($escrow->user)->fullname)
                                                    </td>
                                                    <td>
                                                        @lang(optional($escrow->invitee)->fullname)
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>{{trans('Email')}}</td>
                                                    <td>
                                                        @lang(optional($escrow->user)->email)
                                                    </td>
                                                    <td>
                                                        @lang(optional($escrow->invitee)->email)
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            @if(in_array($escrow['payment_status'],[2,3]))
            <div class="col-lg-5">
                <div class="p-3 mb-4 shadow">
                    <div class="report  justify-content-center " id="pushChatArea">
                        <audio id="myAudio">
                            <source src="{{asset('assets/admin/css/sound.mp3')}}" type="audio/mpeg">
                        </audio>

                        <div class="card ">
                            <div class="adiv flex-row justify-content-start text-white">
                                <p class="p-2 "><i class="fas fa-users "></i> {{trans('Conversation')}}</p>
                            </div>
                            <div class="chat-length" ref="chatArea">
                                <div v-for="(item, index) in items">
                                    <div
                                        v-if=" item.chat_notificational_type == auth_model"
                                        class="d-flex flex-row justify-content-end p-3 "
                                        :title="item.chat_notificational.username">
                                        <div class="bg-white mr-2 pt-1 pb-4  pl-2 pr-2 position-relative mw-130">
                                            <span class="text-wa">@{{item.description}}</span>
                                            <span class="timmer">@{{item.formatted_date}}</span>

                                        </div>
                                        <img
                                            :src="item.chat_notificational.photo"
                                            width="30" height="30">
                                    </div>

                                    <div v-else class="d-flex flex-row justify-content-start p-3"
                                         :title="item.chat_notificational.username">
                                        <img :src="item.chat_notificational.photo" width="30" height="30">
                                        <div class="chat ml-2 pt-1 pb-4  pl-2 pr-5 position-relative mw-130">
                                            @{{item.description}}
                                            <span class="timmer">@{{item.formatted_date}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form @submit.prevent="send" enctype="multipart/form-data" method="post">
                            <div class="writing-box d-flex justify-content-between align-items-center">
                                <div class="input--group form-group px-3 ">
                                    <input class="form--control type_msg" v-model.trim="message"
                                           placeholder="{{trans('Type your message')}}"/>
                                </div>
                                <div class="send text-center">
                                    <button type="button" class="btn btn-success btn--success " @click="send">
                                        <i class="fas fa-paper-plane "></i>
                                    </button>
                                </div>
                            </div>

                            </form>

                        </div>


                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>




    <!-- Modal for Edit button -->
    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="myModalLabel">@lang('Payment Release confirmation')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form role="form" method="POST" class="actionRoute" action="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <p>@lang('Are you want to release payment to') <span class="username text-info"></span> {{trans('?')}}</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="receiver_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
@push('js')

    <script>
        'use strict';
        let pushChatArea = new Vue({
            el: "#pushChatArea",
            data: {
                items: [],
                auth_id: "{{auth()->guard('admin')->id()}}",
                auth_model: "App\\Models\\Admin",
                message: ''
            },
            beforeMount() {
                this.getNotifications();
                this.pushNewItem();
            },
            methods: {
                getNotifications() {
                    let app = this;
                    axios.get("{{ route('admin.push.chat.show',$escrow->id) }}")
                        .then(function (res) {
                            // console.log(res.data)
                            app.items = res.data;
                        })
                },

                pushNewItem() {
                    let app = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                        encrypted: true,
                        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                    });

                    let channel = pusher.subscribe('user-chat-notification.' + "{{ $escrow->id }}");
                    channel.bind('App\\Events\\UserChatNotification', function (data) {
                        app.items.push(data.message);

                        var x = document.getElementById("myAudio");
                        x.play();

                        Vue.nextTick(() => {
                            let messageDisplay = app.$refs.chatArea
                            messageDisplay.scrollTop = messageDisplay.scrollHeight
                        })


                    });
                    channel.bind('App\\Events\\UpdateChatUserNotification', function (data) {
                        app.getNotifications();
                        console.log('update')
                    });
                },

                send() {
                    let app = this;
                    if (app.message.length == 0) {
                        Notiflix.Notify.Failure(`{{trans('Type your message')}}`);
                        return 0;
                    }

                    // app.items = res.data;

                    axios.post("{{ route('admin.push.chat.newMessage')}}", {
                        escrowId: "{{$escrow->id}}",
                        message: app.message
                    }).then(function (res) {

                        if (res.data.errors) {
                            var err = res.data.errors;
                            for (const property in err) {
                                Notiflix.Notify.Failure(`${err[property]}`);
                            }
                        }

                        if (res.data.success == true) {
                            app.message = '';
                            Vue.nextTick(() => {
                                let messageDisplay = app.$refs.chatArea
                                messageDisplay.scrollTop = messageDisplay.scrollHeight
                            })
                        }
                    }).catch(function (error) {

                    });

                }
            }
        });
    </script>


    <script>
        "use strict";
        $(document).on("click", '.payModal', function (e) {
            var id = $(this).data('id');
            $('.username').text($(this).data('username'));
            $('input[name=receiver_id]').val($(this).data('user_id'));
            $(".actionRoute").attr('action', $(this).data('route'));
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

