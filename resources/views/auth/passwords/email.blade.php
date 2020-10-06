@extends('layouts.app')

@section('content')
    <div class="login block">
        <div class="block--in">
            <h1 class="login--h1">Reset Password</h1>
            <div class="login--form">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="login--form_title">Reset Password</p>
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="login--form-block {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="login--form_label">E-Mail Address</label>
                        <input id="email" type="email" class="login--form_input" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
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
                        <button type="submit" class="login--form_btn btn btn-grad btn-orang">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
