@extends('app')
@section('content')
<div style="max-width: 1000px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; color: #333;">Daftar Tugas Rumah</h2>
        <a href="{{ route('tasks.create') }}"
           style="padding: 8px 16px; background: #28a745; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;">
            Tambah Tugas
        </a>
    </div>

    @if($tasks->isEmpty())
        <div style="text-align: center; padding: 40px; background: #f8f9fa; border-radius: 8px;">
            <p style="color: #6c757d; font-size: 18px;">Belum ada tugas. <a href="{{ route('tasks.create') }}" style="color: #007bff;">Tambah sekarang?</a></p>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                <thead>
                    <tr style="background: #f1f3f5;">
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e9ecef;">Tugas</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e9ecef;">Deskripsi</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e9ecef;">Penanggung Jawab</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e9ecef;">Status</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #e9ecef;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $task->title }}</td>
                        <td style="padding: 12px;">{{ $task->description ?? '–' }}</td>
                        <td style="padding: 12px;">{{ $task->assignee->name }}</td>
                        <td style="padding: 12px;">
                            @if($task->is_completed)
                                <span style="color: #28a745; font-weight: bold;">Selesai</span>
                            @else
                                <span style="color: #dc3545; font-weight: bold;">Belum</span>
                            @endif
                        </td>
                        <td style="padding: 12px;">
                            <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                                @if(!$task->is_completed)
                                    <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                                style="padding: 6px 10px; background: #28a745; color: white; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                                            Selesai
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('tasks.edit', $task) }}"
                                   style="padding: 6px 10px; background: #ffc107; color: #212529; text-decoration: none; border-radius: 4px; font-size: 14px; display: inline-block; text-align: center;">
                                    Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin hapus tugas ini?')"
                                            style="padding: 6px 10px; background: #dc3545; color: white; border: none; border-radius: 4px; font-size: 14px; cursor: pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection