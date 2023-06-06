<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">@lang('Dashboard')</span>
                    </a>
                </li>


                {{--Manage User--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage Escrow')</span></li>

                <li class="sidebar-item {{menuActive(['admin.escrow.index'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.index') }}" aria-expanded="false">
                        <i class="fas fa-list"></i>
                        <span class="hide-menu">@lang('All List')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.escrow.pending'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.pending') }}" aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu">@lang('Pending List')</span>
                    </a>
                </li>


                <li class="sidebar-item {{menuActive(['admin.escrow.hold'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.hold') }}" aria-expanded="false">
                        <i class="fas fa-lock"></i>
                        <span class="hide-menu">@lang('Hold Payments')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.escrow.completed'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.completed') }}" aria-expanded="false">
                        <i class="fas fa-check-circle"></i>
                        <span class="hide-menu">@lang('Complete List')</span>
                    </a>
                </li>
                <li class="sidebar-item {{menuActive(['admin.escrow.disputed'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.disputed') }}" aria-expanded="false">
                        <i class="fas fa-people-carry"></i>
                        <span class="hide-menu">@lang('Disputed List')
                            @if( 0 < $totalDisputed)
                            <span class="badge badge-danger badge-pill"> {{$totalDisputed}}</span>
                            @endif
                        </span>
                    </a>

                </li>
                <li class="sidebar-item {{menuActive(['admin.escrow.resolved'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.resolved') }}" aria-expanded="false">
                        <i class="fas fa-hands-helping"></i>
                        <span class="hide-menu">@lang('Resolved List')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.escrow.rejected'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.escrow.rejected') }}" aria-expanded="false">
                        <i class="fas fa-user-times"></i>
                        <span class="hide-menu">@lang('Rejected List')</span>
                    </a>
                </li>


                {{--Manage User--}}
                <li class="nav-small-cap"><span class="hide-menu">@lang('Manage User')</span></li>

                <li class="sidebar-item {{menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.users') }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">@lang('All User')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.email-send') }}"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu">@lang('Send Email')</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">@lang('All Transaction ')</span></li>

                <li class="sidebar-item {{menuActive(['admin.transaction*'],3)}}">
                    <a class="sidebar-link" href="{{ route('admin.transaction') }}" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="hide-menu">@lang('Transaction')</span>
                    </a>
                </li>


                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">@lang('Payment Settings')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.methods')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu">@lang('Payment Methods')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.deposit.manual.index','admin.deposit.manual.create','admin.deposit.manual.edit'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.deposit.manual.index')}}"
                       aria-expanded="false">
                        <i class="fa fa-university"></i>
                        <span class="hide-menu">@lang('Manual Gateway')</span>
                    </a>
                </li>




                <li class="sidebar-item {{menuActive(['admin.payment.pending'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.pending')}}" aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu">@lang('Deposit Request')
                            @if( 0 < $totalPendingPayment)
                                <span class="badge badge-danger badge-pill"> {{$totalPendingPayment}}</span>
                            @endif
                        </span>

                    </a>
                </li>




                <li class="sidebar-item {{menuActive(['admin.payment.log','admin.payment.search'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payment.log')}}" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu">@lang('Payment Log')</span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">@lang('Payout Settings')</span></li>
                <li class="sidebar-item {{menuActive(['admin.payout-method*'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-method')}}"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu">@lang('Payout Methods')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payout-request'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-request')}}" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="hide-menu">@lang('Payout Request')</span>
                    </a>
                </li>

                <li class="sidebar-item {{menuActive(['admin.payout-log*'],3)}}">
                    <a class="sidebar-link" href="{{route('admin.payout-log')}}" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu">@lang('Payout Log')</span>
                    </a>
                </li>


                <li class="nav-small-cap"><span class="hide-menu">@lang('Support Tickets')</span></li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.ticket')}}" aria-expanded="false">
                        <i class="fas fa-ticket-alt"></i>
                        <span class="hide-menu">@lang('All Tickets')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['open']) }}"
                       aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu">@lang('Open Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['closed']) }}"
                       aria-expanded="false">
                        <i class="fas fa-times-circle"></i>
                        <span class="hide-menu">@lang('Closed Ticket')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.ticket',['answered']) }}"
                       aria-expanded="false">
                        <i class="fas fa-reply"></i>
                        <span class="hide-menu">@lang('Answered Ticket')</span>
                    </a>
                </li>


                <li class="nav-small-cap"><span class="hide-menu">@lang('Subscriber')</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.subscriber.index')}}" aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu">@lang('Subscriber List')</span>
                    </a>
                </li>


                <li class="nav-small-cap"><span class="hide-menu">@lang('Controls')</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.basic-controls')}}" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">@lang('Basic Controls')</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="hide-menu">@lang('Email Settings')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-controls')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Email Controls')</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.email-template.show')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Email Template') </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-mobile-alt"></i>
                        <span class="hide-menu">@lang('SMS Settings')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms.config') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Controls')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.sms-template') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('SMS Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="hide-menu">@lang('Push Notification')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('admin.notify-config')}}" class="sidebar-link">
                                <span class="hide-menu">@lang('Configuration')</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.notify-template.show') }}" class="sidebar-link">
                                <span class="hide-menu">@lang('Template')</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{menuActive(['admin.language.create','admin.language.edit*','admin.language.keywordEdit*'],3)}}">
                    <a class="sidebar-link" href="{{  route('admin.language.index') }}"
                       aria-expanded="false">
                        <i class="fas fa-language"></i>
                        <span class="hide-menu">@lang('Manage Language')</span>
                    </a>
                </li>


                <li class="nav-small-cap"><span class="hide-menu">@lang('Theme Settings')</span></li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.logo-seo')}}" aria-expanded="false">
                        <i class="fas fa-image"></i><span
                            class="hide-menu">@lang('Manage Logo & SEO')</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.breadcrumb')}}" aria-expanded="false">
                        <i class="fas fa-file-image"></i><span
                            class="hide-menu">@lang('Manage Breadcrumb')</span>
                    </a>
                </li>


                <li class="sidebar-item {{menuActive(['admin.template.show*'],3)}}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">@lang('Manage Content')</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.template.show*'],1)}}">

                        @foreach(array_diff(array_keys(config('templates')),['message','template_media']) as $name)
                            <li class="sidebar-item {{ menuActive(['admin.template.show'.$name]) }}">
                                <a class="sidebar-link {{ menuActive(['admin.template.show'.$name]) }}"
                                   href="{{ route('admin.template.show',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>


                @php
                    $segments = request()->segments();
                    $last  = end($segments);
                @endphp


                <li class="sidebar-item {{menuActive(['admin.content.create','admin.content.show*'],3)}}">
                    <a class="sidebar-link has-arrow {{Request::routeIs('admin.content.show',$last) ? 'active' : '' }}"
                       href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">@lang('Content Settings')</span>
                    </a>


                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line {{menuActive(['admin.content.create','admin.content.show*'],1)}}">
                        @foreach(array_diff(array_keys(config('contents')),['message','content_media']) as $name)

                            <li class="sidebar-item {{($last == $name) ? 'active' : '' }} ">
                                <a class="sidebar-link {{($last == $name) ? 'active' : '' }}"
                                   href="{{ route('admin.content.index',$name) }}">
                                    <span class="hide-menu">@lang(ucfirst(kebab2Title($name)))</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="list-divider"></li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
