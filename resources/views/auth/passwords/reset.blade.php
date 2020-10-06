@extends('layouts.app')

@section('content')
    <div class="login block">
        <div class="block--in">
            <h1 class="login--h1">Reset Password</h1>
            <div class="login--form">
                <p class="login--form_title">Reset Password</p>
                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="login--form-block {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="login--form_label">E-Mail Address</label>
                        <input id="email" type="email" class="login--form_input" name="email" value="{{ $email or old('email') }}" required autofocus>
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

                    <div class="login--form-block {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="login--form_label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="login--form_input" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="login--form-block">
                        <button type="submit" class="login--form_btn btn btn-grad btn-orang">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
