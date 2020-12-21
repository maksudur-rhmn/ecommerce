@extends('layouts.frontend')

@section('content')
      <!--breadcrumbs area start-->
      <div class="breadcrumbs_area breadcrumbs_bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Login</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!-- login-area start -->
    <div class="login-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="username">Email address *</label>
                                        <input  name="email" type="email" id="username">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="password">Password *</label>
                                        <input name="password" required autocomplete="current-password" type="password" id="password">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <button type="submit" class="submit-btn">Login</button>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-6">
                                    <div class="checkbox-wrap">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-6">
                                    <div class="label-text text-right">
                                        <a href="#">Lost your password?</a>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="create-info">
                                        <span>Not registered? No problem</span>
                                        <a href="{{ url('/register') }}" type="submit">
                                         <p>
                                            
                                           Create an account
                                       
                                         </p>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->    
@endsection
