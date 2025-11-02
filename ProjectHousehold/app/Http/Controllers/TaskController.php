<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('assignee')->get();
        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks-create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        Task::create($request->all());
        return redirect('/tasks')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks-edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        $task->update($request->all());
        return redirect('/tasks')->with('success', 'Tugas berhasil diupdate!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Tugas berhasil dihapus!');
    }

    public function markCompleted(Task $task)
    {
        $task->update(['is_completed' => true]);
        return redirect('/tasks')->with('success', 'Tugas ditandai selesai!');
    }
}