@extends('app')
@section('content')
<div style="max-width: 450px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 25px; color: #333;"> Daftar Anggota Baru</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Password (min. 4 karakter)</label>
            <input type="password" name="password" required minlength="4"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <button type="submit"
                style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background 0.3s;">
            Daftar Akun
        </button>
    </form>

    <p style="text-align: center; margin-top: 20px;">
        Sudah punya akun? <a href="{{ route('login.form') }}" style="color: #007bff; text-decoration: none;">Login di sini</a>
    </p>
</div>
@endsection