@extends('frontend.layouts.login')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
    <div class="login-view">
    <div class="container-fluid">
        <div class="login-header">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-s-12">
                <a href="#"><img src="{{asset('public/img/loginlogo.png')}}" alt="logoimage"></a>
            </div>
        </div>
        </div>
        <!--end of login header section -->         
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-s-12">
                <div class="login-body-section">
                    <div class="row">
                        <div class="col-md-3">
                            <h1>
                                The Leader In Borrower Retention
                            </h1>
                            <button class="btn btn-red">
                                request agent
                            </button>
                        </div>
                        <div class="col-md-5 col-md-offset-4">
                            <div class="login-box-container">
                            <form method="post" id="login-form" class="login-form" action="<?php echo url('/') . '/agent-login'; ?>">
                                {{ csrf_field() }}
                                <h2 class="">Login</h2>
                                <p>Don’t have an account? <a href="#">Sign Up</a></p>
                                <div class="form-group field m-t-30">                                   
                                <input type="text" required="required" name="username" class="form-control" id="username" placeholder="Username">
                                <label for="username">Username</label>
                                </div>
                                <div class="form-group field">
                                <input type="password" required="required" class="form-control" name="password" id="password" placeholder="password">
                                <label for="password">Password</label>
                                </div>
                                <div class="checkbox">
                                <label><input type="checkbox"> Remember me</label>

                                <a href="#" class="pull-right"> forget password ?</a>
                                </div>
                                <p><button type="submit" class="btn btn-red btn-small">Login</button></p>
                            </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="login-footer">
        <div class=" container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-s-12">
            <div class="row">
                <div class="col-md-6 tex-left">
                <ul class="list-inline list-unstyled">
                    <li>2018 - 2019</li>
                    <li> All Rights Reserved</li>
                </ul>
                                                           
                </div>
                <div class="col-md-6 text-right">
                <ul class="list-inline list-unstyled">
                    <li>Tel. <a href="tel:800.716.0115 9" class="footer_link">800.716.0115 9</a></li>
                    <li><a href="mailto:info@agentfind.com"  class="footer_link">info@agentfind.com</a></li>
                </ul>
                                              
                </div>
            </div>
        </div>  
        </div>
        </div>  
        </div>
    </div>
 </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
