@extends('layout')

@section('content')
<h2 class="text-2xl font-semibold mb-4 text-pink-700">Daftar Tugas 🌻</h2>
<a href="/todos/create" class="bg-green-400 text-white px-4 py-2 rounded-lg hover:bg-green-500">+ Tambah Tugas</a>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
@foreach($todos as $todo)
  <div class="bg-white rounded-xl shadow p-4 border-l-4 border-pink-400">
    <h3 class="text-lg font-bold text-pink-600">{{$todo->title}}</h3>
    <p class="text-sm text-gray-600">{{$todo->description}}</p>
    <p class="mt-2 text-sm">Status: 
      <span class="font-semibold {{ $todo->status == 'selesai' ? 'text-green-600' : 'text-gray-500' }}">
        {{$todo->status}}
      </span>
    </p>
    <div class="mt-3 flex gap-2">
      <a href="/todos/{{$todo->todo_id}}/edit" class="text-blue-500">✏️ Edit</a>
      <form action="/todos/{{$todo->todo_id}}" method="POST">
        @csrf @method('DELETE')
        <button class="text-red-500">🗑️ Hapus</button>
      </form>
    </div>
  </div>
@endforeach
</div>
@endsection
