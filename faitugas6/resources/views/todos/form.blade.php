@extends('layout')

@section('content')
<h3>{{ isset($todo) ? 'Edit' : 'Tambah' }} ToDo</h3>
<form method="POST" action="{{ isset($todo) ? '/todos/'.$todo->todo_id : '/todos' }}">
    @csrf
    @if(isset($todo)) @method('PUT') @endif
    <div class="mb-3"><input type="text" name="title" value="{{ $todo->title ?? '' }}" class="form-control" placeholder="Judul" required></div>
    <div class="mb-3"><textarea name="description" class="form-control" placeholder="Deskripsi">{{ $todo->description ?? '' }}</textarea></div>
    <div class="mb-3"><input type="date" name="due_date" value="{{ $todo->due_date ?? '' }}" class="form-control" required></div>
    <div class="mb-3">
        <select name="status" class="form-select">
            <option value="belum" {{ (isset($todo) && $todo->status=='belum') ? 'selected' : '' }}>Belum</option>
            <option value="selesai" {{ (isset($todo) && $todo->status=='selesai') ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
