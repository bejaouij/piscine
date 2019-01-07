@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                    <form id="r" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-field col s6">
                            <label for="user_firstname">{{ __('Firstname') }}</label>

                            <input id="user_firstname" type="text" class="validate" name="user_firstname" value="{{ old('user_firstname') }}" required autofocus>

                            @if ($errors->has('user_firstname'))
                                <span role="alert">{{ $errors->first('user_firstname') }}</span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <label for="user_lastname">{{ __('Lastname') }}</label>

                            <input id="user_lastname" type="text" class="validate" name="user_lastname" value="{{ old('user_lastname') }}" required>

                            @if ($errors->has('user_lastname'))
                                <span role="alert">{{ $errors->first('user_lastname') }}</span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <label for="user_phone_number">{{ __('Phone number') }}</label>

                            <input id="user_phone_number" type="text" class="validate" name="user_phone_number" value="{{ old('user_phone_number') }}" required>

                            @if ($errors->has('user_phone_number'))
                                <span role="alert"><strong>{{ $errors->first('user_phone_number') }}</span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span role="alert">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="validate" name="password" required>

                            @if ($errors->has('password'))
                                <span role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                        </div>

                        <div class="col s12">
                            <input type="checkbox" name="is_professional" id="is_professional" {{ old('is_professional') ? 'checked' : '' }}>

                            <label class="form-check-label" for="is_professional">
                                {{ __('I am a professional') }}
                            </label>
                        </div>

                        <div class="input-field col s12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
    </div>
</div>
@endsection
