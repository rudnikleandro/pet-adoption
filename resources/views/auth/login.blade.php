@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/images/paw.png') }}" alt="Logo" width="72" height="57">
                    <h1 class="h5 mb-3 fw-normal">Acesse sua conta</h1>
                </div>

                <div class="form-floating mb-3">
                    <input id="email" type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com"
                        value="{{ old('email') }}" required autofocus>
                    <label for="email">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                    <label for="password">Senha</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Lembrar de mim
                    </label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>

                @if (Route::has('password.request'))
                    <p class="mt-3 mb-0 text-center">
                        <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    </p>
                @endif

                <p class="mt-4 mb-0 text-center text-body-secondary">Adoção Pet © 2025</p>
            </form>
        </div>
    </div>
@endsection
