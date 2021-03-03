@extends('layouts.app-guest')

@section('content')

    <div class="card-recovery-password">
        <div class="card-header-recovery-password">
            {{ __('Login Cliente') }}
        </div>
        <div class="text-recovery-password">
            <p>Inserisci il tuo indirizzo email qui sotto per ricevere un link di reimpostazione della password.</p>
        </div>
        <div class="card-body-recovery-password">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-recovery-password">
                    <label for="email" class="label-recovery-password">{{ __('E-Mail Address') }}
                    </label>
                    <div class="container-input-recovery-password">
                        <input id="email" type="email" placeholder="Inserisci la email..." class="form-input-recovery-password
                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="container-button-recovery-password">
                    <button type="submit" class="button-recovery-password">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
