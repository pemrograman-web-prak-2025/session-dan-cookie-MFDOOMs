@extends('app')
@section('content')
<div style="max-width: 450px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 25px; color: #333;">Login Anggota Rumah</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Password</label>
            <input type="password" name="password" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px; display: flex; align-items: center;">
            <input type="checkbox" name="remember" id="remember" style="width: auto; margin-right: 8px;">
            <label for="remember" style="font-weight: normal;">Ingat saya</label>
        </div>
        
        <button type="submit"
                style="width: 100%; padding: 12px; background: #007bff; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background 0.3s;">
            Masuk
        </button>
    </form>

    <p style="text-align: center; margin-top: 20px;">
        Belum punya akun? <a href="{{ route('register.form') }}" style="color: #007bff; text-decoration: none;">Daftar di sini</a>
    </p>
</div>
@endsection