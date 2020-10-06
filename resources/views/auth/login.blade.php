@extends('layouts.app')

@section('content')
    <div class="login block">
        <div class="block--in">
            <h1 class="login--h1">Login</h1>
            <div class="login--form">
                @if (session()->has('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif
                <p class="login--form_title">Вход в систему</p>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="login--form-block {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="login--form_label">E-Mail Address</label>


                        <input id="email" type="email" class="login--form_input" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="login--form-block {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="login--form_label">Password</label>

                        <input id="password" type="password" class="login--form_input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="login--form-block">
                        {!! Captcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="login--form-block">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="login--form_btn btn btn-grad btn-orang">Login</button>
                    <p class="forgot-link"><a class="" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                </form>
            </div>
        </div>
    </div>



@endsection
