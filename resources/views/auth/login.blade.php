@extends('layouts.app')

@section('content')
<div class="container-general-login">
    <div class="container-form-login">

            <div class="card-login">
                <div class="card-header-login">{{ __('Login') }}</div>

                <div class="card-body-login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="label-email-address-login">{{ __('E-Mail Address') }}</label>

                            <div class="container-input-email">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-password-login">{{ __('Password') }}</label>

                            <div class="container-input-password">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="container-button-login">
                                <button type="submit" class="button-login">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="forgot-password">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
