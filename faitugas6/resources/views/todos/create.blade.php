@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-6 mt-10">
    <h2 class="text-2xl font-bold text-pink-600 mb-4">Tambah Tugas Baru 📝</h2>

    <form method="POST" action="/todos">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Judul Tugas</label>
            <input type="text" name="title" required
                   class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                      class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Tenggat Waktu</label>
            <input type="date" name="due_date"
                   class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-pink-400">
        </div>

        <button class="w-full bg-pink-500 text-white p-3 rounded-lg hover:bg-pink-600 transition">
            Simpan Tugas 🌸
        </button>
    </form>
</div>
@endsection
