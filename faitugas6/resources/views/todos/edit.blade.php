@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-6 mt-10">
    <h2 class="text-2xl font-bold text-pink-600 mb-4">Edit Tugas ✏️</h2>

    <form method="POST" action="/todos/{{ $todo->todo_id }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Judul Tugas</label>
            <input type="text" name="title" value="{{ $todo->title }}" required
                   class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                      class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">{{ $todo->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Tenggat Waktu</label>
            <input type="date" name="due_date" value="{{ $todo->due_date }}"
                   class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Status</label>
            <select name="status"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">
                <option value="belum" {{ $todo->status == 'belum' ? 'selected' : '' }}>Belum</option>
                <option value="selesai" {{ $todo->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="w-full bg-pink-500 text-white p-3 rounded-lg hover:bg-pink-600 transition">
            Simpan Perubahan 🌸
        </button>
    </form>
</div>
@endsection
