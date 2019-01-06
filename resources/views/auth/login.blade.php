@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form id="login-form" class="col s12" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-field col s12">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span role="alert">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="input-field col s12">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password" class="validate" name="password" required>

                @if ($errors->has('password'))
                    <span role="alert">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="col s12">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="input-field col s12">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
