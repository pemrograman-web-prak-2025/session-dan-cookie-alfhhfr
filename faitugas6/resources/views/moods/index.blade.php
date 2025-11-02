@extends('layout')

@section('content')
<h2 class="text-2xl font-semibold mb-4 text-purple-700">Mood Tracker 🌈</h2>

<!-- form tambah mood -->
<div class="bg-white rounded-xl shadow p-4 mb-6 border-l-4 border-purple-400">
    <form method="POST" action="{{ route('moods.store') }}">
        @csrf
        <div class="mb-3">
            <label for="mood" class="form-label font-semibold">Gimana mood kamu hari ini??:</label>
            <select name="mood" id="mood" class="form-select w-full border rounded px-2 py-1" required>
                <option value="">-- Pilih --</option>
                <option value="😊 Senang">😊 Senang</option>
                <option value="😐 Biasa">😐 Biasa</option>
                <option value="😔 Sedih">😔 Sedih</option>
                <option value="😡 Marah">😡 Marah</option>
                <option value="😴 Lelah">😴 Lelah</option>
            </select>
        </div>

        <div class="mb-3">
            <textarea name="note" class="w-full border rounded px-2 py-1" rows="2" placeholder="Kenapa tuhh?? Ceritaaa dongg!!!"></textarea>
        </div>

        <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 w-full">Simpan Mood</button>
    </form>
</div>

<!-- grid riwayat mood -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($moods as $mood)
    <div class="bg-white rounded-xl shadow p-4 border-l-4 border-pink-400">
        <h3 class="text-lg font-bold">{{ $mood->mood }}</h3>
        <p class="text-sm text-gray-600 mt-1">{{ $mood->note ?? 'Tidak ada catatan' }}</p>
        <p class="mt-2 text-sm text-gray-500">Tanggal: {{ \Carbon\Carbon::parse($mood->created_at)->format('d M Y') }}</p>
        <div class="mt-3 flex gap-2">
            <a href="{{ route('moods.edit', $mood->mood_id) }}" class="text-blue-500">✏️ Edit</a>
            <form action="{{ route('moods.destroy', $mood->mood_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500" onclick="return confirm('Yakin hapus mood ini?')">🗑️ Hapus</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
