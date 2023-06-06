@extends('pdoc::layouts.app')
@section('content')
    <div class="header">
        <h3><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Server Requirements</h3>
        <div class="installation success-25">
            <div class="progress-item success"><i class="fa fa-home" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-list" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-key" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-check" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="content-body">
        <ul class="list-group mt-3">
            @foreach($checkExtensions as $key => $extension)
                @if($loop->first)
                    <li class="list-group-item d-flex align-items-center justify-content-between bg-secondary text-white">
                        <span>{{ $key }}</span><span>{{ "Current version ".phpversion() }} <i
                                class="{{ $extension == 1 ? 'text-success fa fa-check-square' : 'text-danger fa fa-times' }}"
                                aria-hidden="true"></i></span></li>
                @else
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <span>{{ $key }}</span><i
                            class="{{ $extension == 1 ? 'text-success fa fa-check-square' : 'text-danger fa fa-times' }}"
                            aria-hidden="true"></i></li>
                @endif
            @endforeach
        </ul>
        @if(!in_array(0, $checkExtensions))
            <a class="btn-proceed" href="{{ route('check.permissions') }}">Check Permissions&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
        @else
            <a class="btn-proceed" href="{{ route(request()->route()->getName()) }}">Check Again&nbsp;<i class="fa fa-refresh" aria-hidden="true"></i></a>
        @endif
    </div>
@endsection
