@extends('pdoc::layouts.app')
@section('content')
    <div class="header">
        <h3><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Project Installation</h3>
        <div class="installation success-0">
            <div class="progress-item success"><i class="fa fa-home" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-list" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-key" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <div class="progress-item"><i class="fa fa-check" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="content-body">
        @if($pid)
        <h5 class="text-center pt-5 pb-5">To setup your project please follow the following instructions.</h5>
        <a class="btn-proceed" href="{{ route('check.requirements') }}">Check Requirements&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>
        @else
            <div class="alert alert-danger text-dark border-left">
                <strong class="text-danger">Oops!</strong> Your product may be invalid or corrupted. Please contact with your author.
            </div>
        @endif
    </div>
@endsection
