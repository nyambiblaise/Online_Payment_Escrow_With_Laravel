@extends('pdoc::layouts.app')
@section('content')
    <div class="header">
        <h3><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Setup Environment</h3>
        <div class="installation success-100">
            <div class="progress-item success"><i class="fa fa-home" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-list" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-key" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-check" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="content-body d-flex flex-column align-items-center justify-content-center">
        <div class="success-card card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="checkmark">✓</i>
            </div>
            <h1>SUCCESS</h1>
            <p>Your Project has been installed successfully.</p>
        </div>
        <a class="btn-proceed mt-3 text-white" href="{{ url($path ?? '/') }}" type="submit">Continue&nbsp;&nbsp;<i class=" fa-2x fa fa-home" aria-hidden="true"></i>
        </a>
    </div>
@endsection
