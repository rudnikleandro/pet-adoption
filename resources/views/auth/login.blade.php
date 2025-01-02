@extends('layouts.app')

@section('content')
<main class="form-signin w-100 m-auto">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating mb-3">
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
            <label for="email">Email address</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Remember me
            </label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

        @if (Route::has('password.request'))
        <p class="mt-2">
            <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </p>
        @endif

        <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
    </form>
</main>
@endsection
