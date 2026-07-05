@extends('layouts.auth')

@section('title', 'Register - SIAKAD')

@section('content')
<div class="auth-card">
    <div class="auth-logo">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h4 class="auth-title">Buat Akun Baru</h4>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="name" class="form-control auth-input @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
            </div>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Email Address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control auth-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan email Anda" required>
            </div>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control auth-input @error('password') is-invalid @enderror" placeholder="Buat password (min. 8 karakter)" required>
            </div>
            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold text-muted small">Konfirmasi Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                <input type="password" name="password_confirmation" class="form-control auth-input" placeholder="Ulangi password Anda" required>
            </div>
        </div>

        <button type="submit" class="btn auth-btn w-100 mb-3 shadow-sm">REGISTER</button>
    </form>
    
    <div class="text-center mt-3">
        <span class="text-muted small">Sudah memiliki akun? </span>
        <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: var(--primary-color);">Login di sini</a>
    </div>
</div>
@endsection