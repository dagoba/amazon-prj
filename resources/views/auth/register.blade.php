@extends('layouts.app')

@section('content')
    <div class="login block">
        <div class="block--in">
            <h1 class="login--h1">Register</h1>
            @if (session()->has('message'))
                <div class="alert alert-info" style="text-align: center;color: #ab2daa;">{{ session('message') }}</div>
            @endif
            <div class="login--form">
                <p class="login--form_title">Регистрация в системе</p>
                <form id="register_form" class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                     
                    <div class="login--form-block {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="login--form_label">Name</label>
                        <input id="name" type="text" class="login--form_input" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="login--form-block {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="login--form_label">E-Mail Address</label>
                        <input id="email" type="email" class="login--form_input" name="email" value="{{ old('email') }}" required>
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
                        <label for="password-confirm" class="login--form_label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="login--form_input" name="password_confirmation" required>
                    </div>

                    <div class="login--form-block">
                        {!! Captcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="login--form_btn btn btn-grad btn-orang">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
