@extends('pdoc::layouts.app')
@section('content')
    <div class="header">
        <h3><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Permissions</h3>
        <div class="installation success-50">
            <div class="progress-item success"><i class="fa fa-home" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-list" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-key" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-check" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="content-body">
        <ul class="list-group">
            @foreach($chekPermissions['exts'] as $key => $permission)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>{{ $key }}</span><i
                        class="{{ isset($permission['value']) && $permission['value'] == 1 ? 'text-success fa fa-check-square' : 'text-danger fa fa-times' }}"
                        aria-hidden="true">&nbsp;{{ isset($permission['permission']) ? $permission['permission'] : '' }} {{ $permission['value'] == 0 ? '(Required '.$permission['required'].')' : ''  }}</i>
                </li>
            @endforeach
        </ul>
        @if($chekPermissions['grantPermission'] == 1)
            <a class="btn-proceed" href="{{ route('product.code') }}">Setup product <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        @else
            <a class="btn-proceed" href="{{ route(request()->route()->getName()) }}">Check Again&nbsp;<i class="fa fa-refresh" aria-hidden="true"></i></a>
        @endif
    </div>
@endsection
