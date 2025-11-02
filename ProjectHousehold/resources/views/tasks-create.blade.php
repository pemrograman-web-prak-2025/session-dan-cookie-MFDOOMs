@extends('app')
@section('content')
<div style="max-width: 500px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
    <h2 style="margin-bottom: 25px; color: #333;">Tambah Tugas Baru</h2>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Nama Tugas:</label>
            <input type="text" name="title" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Deskripsi (opsional):</label>
            <textarea name="description" rows="4"
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;"></textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: bold;">Assign ke:</label>
            <select name="assigned_to" required
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; gap: 10px; align-items: center;">
            <button type="submit"
                    style="padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                Simpan Tugas
            </button>
            <a href="{{ route('tasks.index') }}"
               style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 6px; font-size: 16px; transition: background 0.3s;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection