@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg mt-20">
  <h2 class="text-3xl font-bold text-center text-pink-500 mb-6">Login</h2>
  
  {{-- ✅ Notifikasi sukses / error --}}
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 mb-3 rounded-lg text-center">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="bg-red-100 text-red-800 p-2 mb-3 rounded-lg text-center">
      {{ session('error') }}
    </div>
  @endif

  <form method="POST" action="/login">
    @csrf
    <input type="email" name="email" placeholder="Email"
      class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-pink-400" required>

    <input type="password" name="password" placeholder="Password"
      class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-pink-400" required>

    {{-- Checkbox Remember Me --}}
    <div class="flex items-center mb-4">
      <input type="checkbox" name="remember" id="remember"
        class="mr-2 accent-pink-500 focus:ring-pink-400">
      <label for="remember" class="text-gray-700 text-sm">Ingat saya (Remember Me)</label>
    </div>

    <button class="w-full bg-pink-500 text-white p-3 rounded-lg hover:bg-pink-600 transition-all duration-200">
      Masuk
    </button>

    <p class="text-center text-sm mt-4">Belum punya akun?
      <a href="/register" class="text-pink-600 font-semibold">Daftar</a>
    </p>
  </form>
</div>
@endsection
