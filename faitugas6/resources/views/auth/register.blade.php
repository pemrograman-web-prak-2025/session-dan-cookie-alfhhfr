@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg mt-20">
  <h2 class="text-3xl font-bold text-center text-pink-500 mb-6">Daftar Akun Baru</h2>

  <form method="POST" action="/register">
    @csrf
    <input type="text" name="username" placeholder="Username"
      class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-pink-400" required>

    <input type="email" name="email" placeholder="Email"
      class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-pink-400" required>

    <input type="password" name="password" placeholder="Password"
      class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-pink-400" required>

    <button class="w-full bg-pink-500 text-white p-3 rounded-lg hover:bg-pink-600 transition">
      Buat Akun 💫
    </button>

    <p class="text-center text-sm mt-4">Sudah punya akun?
      <a href="/login" class="text-pink-600 font-semibold">Masuk di sini</a>
    </p>
  </form>
</div>
@endsection
