@extends('layouts.auth')

@section('title', 'Login - SIAKAD')

@section('content')
<div class="auth-card">
    <div class="auth-logo">
        <i class="bi bi-mortarboard-fill"></i>
    </div>
    <h4 class="auth-title">Login SIAKAD</h4>

    @include('partials.flash')

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="form-label fw-bold text-muted small">Email Address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control auth-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autofocus>
            </div>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold text-muted small">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control auth-input @error('password') is-invalid @enderror" placeholder="Masukkan password Anda" required>
            </div>
            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn auth-btn w-100 mb-3 shadow-sm">LOG IN</button>
    </form>
    
    <div class="text-center mt-4">
        <span class="text-muted small">Belum memiliki akun? </span>
        <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: var(--primary-color);">Daftar Sekarang</a>
    </div>
</div>
@endsection