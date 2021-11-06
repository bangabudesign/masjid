@extends('layouts.state')

@section('content')
<section class="py-5">
    <div class="container" style="max-width: 500px">
        <div class="card border-0 p-4 p-md-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-primary mb-3 py-2">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <a class="btn btn-block btn-secondary mt-3 py-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
