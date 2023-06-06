@extends($theme.'layouts.user')
@section('title', trans('Ask For Help'))
@section('content')

    @include($theme.'partials.banner')


    <section class="blog-section pt-100 pb-100">
        <div class="container">

            <div class="row justify-content-center g-4">

                <div class="{{(in_array($escrow->payment_status, [2,3])) ? 'col-md-5' : 'col-md-12'}} ">
                    <article>
                        <div class="post-details">
                            <div class="post-inner">
                                <div class="post-header">
                                    <h6><span
                                            class="text--base pe-3">{{trans('Title')}} :</span> {{trans($escrow->title)}}
                                    </h6>
                                </div>
                                <div class="post-content mt-3">
                                    <div class="entry-content ps-0">
                                        <p class="mb-3">
                                            <span class="text--base pe-3">{{trans('Invoice ID')}} :</span>
                                            {{$escrow->invoice}}
                                        </p>

                                        <p class="mb-3">
                                            <span class="text--base pe-3">{{trans('Amount')}} :</span>
                                            {{trans(config('basic.currency_symbol'))}}{{getAmount($escrow->amount)}}
                                        </p>
                                        <p class="mb-3">
                                            <span class="text--base pe-3">{{trans('Charge')}} :</span>
                                            {{trans(config('basic.currency_symbol'))}}{{getAmount($data['charge'])}}
                                        </p>

                                        <p class="mb-4">
                                            <span class="text--base pe-3">{{trans('Status')}} :</span>
                                            @if($escrow['status'] == 0)
                                                <span class="badge bg-secondary">{{trans('Pending')}}</span>
                                            @elseif($escrow['status'] == 2)
                                                <span class="badge bg-danger">{{trans('Rejected')}}</span>
                                            @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 0)
                                                <span class="badge bg-info">{{trans('Hold')}}</span>
                                            @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 1)
                                                <span class="badge bg-success">{{trans('Completed')}}</span>
                                            @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 2)
                                                <span class="badge bg-warning">{{trans('Disputed')}}</span>
                                            @elseif($escrow['status'] == 1 && $escrow['payment_status'] == 3)
                                                <span class="badge bg-primary">{{trans('Resolved by Admin')}}</span>
                                            @endif
                                        </p>

                                        @if($escrow['status'] == 1 && $escrow['payment_status'] == 3)
                                            <p class="mb-4">
                                                <span class="text--base pe-3">{{trans('Justice Favor')}} :</span>
                                                {{optional($escrow->favor)->username}}
                                            </p>
                                        @endif




                                        @if($escrow->report)
                                            <p class="mb-3 mt-2">
                                                <span class="text--base pe-3">{{trans('Report')}} :</span>
                                                @lang($escrow->report)
                                            </p>
                                            <p class="mb-4">
                                                <span class="text--base pe-3">{{trans('Reported By')}} :</span>
                                                {{optional($escrow->reporter)->username}}
                                            </p>
                                        @endif

                                        <p class="mb-3">
                                            <span class="text--base pe-3">{{trans('Rules')}} :</span>
                                            @lang($escrow->rules)
                                        </p>
                                        @if($escrow->image)
                                            <p class="mb-4 d-flex">
                                                <span class="text--base pe-1">{{trans('Documents')}} :</span>
                                                <a href="{{$data['file_location']}}"
                                                   class="text-white">{{$escrow->image}}</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>


                @if(in_array($escrow->payment_status, [2,3]))
                    <div class="col-md-7">
                        <div class="report  justify-content-center" id="pushChatArea">

                            <audio id="myAudio">
                                <source src="{{asset('assets/admin/css/sound.mp3')}}" type="audio/mpeg">
                            </audio>

                            <div class="card ">

                                <div class="adiv flex-row justify-content-start text-white">
                                    <p class="p-2 "><i class="las la-users "></i> {{trans('Conversation')}}</p>
                                </div>


                                <div class="chat-length" ref="chatArea">


                                    <div v-for="(item, index) in items">
                                        <div
                                            v-if="item.chat_notificational_id == auth_id && item.chat_notificational_type == auth_model"
                                            class="d-flex flex-row justify-content-end p-3 "
                                            :title="item.chat_notificational.username">
                                            <div class="bg-white me-2 pt-1 pb-4  ps-2 pe-2 position-relative mw-130">
                                                <span class="text-wa">@{{item.description}}</span>
                                                <span class="timmer">@{{item.formatted_date}}</span>

                                            </div>
                                            <img
                                                :src="item.chat_notificational.photo"
                                                width="30" height="30">
                                        </div>

                                        <div v-else="item.chat_notificational_id != auth_id"
                                             class="d-flex flex-row justify-content-start p-3  "
                                             :title="item.chat_notificational.username">
                                            <img
                                                :src="item.chat_notificational.photo"
                                                width="30" height="30">
                                            <div class="chat ms-2 pt-1 pb-4  ps-2 pe-5 position-relative mw-130">
                                                @{{item.description}}
                                                <span class="timmer">
                                                @{{item.formatted_date}}</span>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                @if($escrow->payment_status == 2)

                                    <form @submit.prevent="send" enctype="multipart/form-data" method="post">
                                        <div class="writing-box d-flex justify-content-between align-items-center">

                                            <div class="input--group px-3 ">
                                                <input class="form--control type_msg" v-model.trim="message"
                                                       placeholder="{{trans('Type your message')}}"/>
                                            </div>
                                            <div class="send text-center">
                                                <button type="button" class="btn btn-success " @click="send"><i
                                                        class="las la-paper-plane "></i>
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
@endsection

@push('script')

    <script>
        'use strict';
        let pushChatArea = new Vue({
            el: "#pushChatArea",
            data: {
                items: [],
                auth_id: "{{auth()->id()}}",
                auth_model: "App\\Models\\User",
                message: ''
            },
            beforeMount() {
                this.getNotifications();
                this.pushNewItem();
            },
            methods: {
                getNotifications() {
                    let app = this;
                    axios.get("{{ route('user.push.chat.show',$escrow->id) }}")
                        .then(function (res) {
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

                    axios.post("{{ route('user.push.chat.newMessage')}}", {
                        escrowId: "{{$escrow->id}}",
                        message: app.message
                    }).then(function (res) {

                        if (res.data.errors) {
                            var err = res.data.errors;
                            for (const property in err) {
                                Notiflix.Notify.Failure(`${err[property]}`);
                            }
                            return 0;
                        }

                        app.message = '';

                        if (res.data.success == true) {

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




    @if($errors->any())
        <script>
            'use strict';
            @foreach ($errors->all() as $error)
            Notiflix.Notify.Failure(`{{trans($error)}}`);
            @endforeach
        </script>
    @endif
@endpush
