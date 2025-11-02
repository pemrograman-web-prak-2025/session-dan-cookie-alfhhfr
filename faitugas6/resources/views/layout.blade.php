<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>ToDo Mood</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-yellow-100 to-blue-100 min-h-screen font-sans">

  <nav class="bg-white/70 backdrop-blur-md shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-pink-600">🌤️ ToDo Mood</h1>
    <div>
      <a href="/todos" class="px-3 text-gray-700 hover:text-pink-600">ToDo</a>
      <a href="/moods" class="px-3 text-gray-700 hover:text-pink-600">Mood</a>
    @if(auth()->check())
    <a href="/logout" class="ml-4 px-3 py-1 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
     Logout ({{ auth()->user()->username }})
    </a>
    @else
    <a href="/login" class="ml-4 px-3 py-1 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
     Login
    </a>
    @endif
    </div>
  </nav>

  <div class="p-6">
    @yield('content')
  </div>

</body>
</html>
