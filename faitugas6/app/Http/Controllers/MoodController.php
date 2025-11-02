<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;

class MoodController extends Controller
{
    public function index()
    {
        $moods = Mood::where('user_id', auth()->id())
                     ->orderBy('mood_date', 'desc')
                     ->get();

        return view('moods.index', compact('moods'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'mood' => 'required|in:😊 Senang,😐 Biasa,😔 Sedih,😡 Marah,😴 Lelah',
            'note' => 'nullable|string',
        ]);

        Mood::create([
            'user_id' => auth()->id(),
            'mood' => $request->mood, 
            'note' => $request->note,
            'mood_date' => date('Y-m-d'),
        ]);

        return redirect()->route('moods.index')
                         ->with('success', 'Mood berhasil disimpan!');
    }
}
