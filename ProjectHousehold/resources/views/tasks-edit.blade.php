@extends('app')
@section('content')
<h2>Edit Tugas: {{ $task->title }}</h2>
<form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')
    <p>
        <label>Nama Tugas:</label><br>
        <input type="text" name="title" value="{{ $task->title }}" required>
    </p>
    <p>
        <label>Deskripsi:</label><br>
        <textarea name="description">{{ $task->description }}</textarea>
    </p>
    <p>
        <label>Assign ke:</label><br>
        <select name="assigned_to" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" @if($user->id == $task->assigned_to) selected @endif>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </p>
    <button type="submit">Update Tugas</button>
    <a href="{{ route('tasks.index') }}">Batal</a>
</form>
@endsection