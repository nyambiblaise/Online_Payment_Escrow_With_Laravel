@extends('pdoc::layouts.app')
@section('content')
    <div class="header">
        <h3><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Required Information about the product</h3>
        <div class="installation success-75">
            <div class="progress-item success"><i class="fa fa-home" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-list" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-key" aria-hidden="true"></i></div>
            <div class="progress-item success"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <div class="progress-item "><i class="fa fa-check" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="content-body">
        @if(session()->has('error'))
            <div class="alert alert-danger text-dark border-left alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong class="text-danger">Oops!</strong> {{ session('error') }}
            </div>
        @endif
        <div class="tab-content text-left mt-3">
            <div id="manually">
                <form class="form-block" action="{{ route('submit.product.code') }}" method="post">
                    <fieldset>
                        <legend>Purchase Verification</legend>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Purchased Code</label>
                            <input type="text" name="purchased_code"
                                   class="form-control @error('purchased_code') is-invalid @enderror"
                                   value="{{ old('purchased_code') }}" placeholder="Enter Product Purchased Code">
                            @error('purchased_code')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" aria-describedby="emailHelp"
                                   placeholder="Enter Your Email">
                            <small id="emailHelp" class="form-text text-muted">To get latest updates news, urgent
                                notices, Offers/Sales news etc.
                            </small>
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Database Setup</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Database Host</label>
                                    <input type="text" name="database_host"
                                           class="form-control @error('database_host') is-invalid @enderror"
                                           value="{{ old('database_host', '127.0.0.1') }}"
                                           placeholder="Enter Database Host">
                                    @error('database_host')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Database Port</label>
                                    <input type="text" name="database_port"
                                           class="form-control @error('database_port') is-invalid @enderror"
                                           value="{{ old('database_port', '3306') }}" placeholder="Enter Database Port">
                                    @error('database_port')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Database Name</label>
                                    <input type="text" name="database_name"
                                           class="form-control @error('database_name') is-invalid @enderror"
                                           value="{{ old('database_name') }}" placeholder="Enter Database Name">
                                    @error('database_name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Database User Name</label>
                                    <input type="text" name="database_username"
                                           class="form-control @error('database_username') is-invalid @enderror"
                                           value="{{ old('database_username') }}"
                                           placeholder="Enter Database User Name">
                                    @error('database_username')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Database Password</label>
                                    <input type="password" name="database_password"
                                           class="form-control @error('database_password') is-invalid @enderror"
                                           value="{{ old('database_password') }}" placeholder="Enter Database Password">
                                    @error('database_password')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button class="btn-proceed" type="submit">Proceed&nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
