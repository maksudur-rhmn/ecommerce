@extends('layouts.frontend')

@section('content')
      <!-- Register-area start -->
      <div class="login-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8">
                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="username">Username</label>
                                        <input value="{{ old('name') }}" required autofocus autocomplete="name" name="name" type="text" id="username">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="Email">Email address *</label>
                                        <input name="email" value="{{ old('email') }}" required type="text" id="username">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>                                    
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="password">Password *</label>
                                        <input id="password" type="password" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                   <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <label for="Confirm password">Confirm Password *</label>
                                        <input id="password" type="password" name="password_confirmation" required autocomplete="new-password">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-wrap">
                                        <button type="submit" class="submit-btn">Register</button>
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