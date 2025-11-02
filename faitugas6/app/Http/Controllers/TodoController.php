<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();
        return view('todos.index', compact('todos'));
    }

    public function create() { return view('todos.create'); }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);

        Todo::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'belum'
        ]);

        return redirect('/todos')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return redirect('/todos')->with('success', 'Tugas diperbarui!');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return back()->with('success', 'Tugas dihapus!');
    }
}
