<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all(); // Fetch all songs
        return view('welcome', compact('songs')); // Pass songs to the view
    }
    public function create()
    {
        
        if (Auth::check()) {
            return view('create');
        } else {
            
            return redirect()->route('login')->with('error', 'You need to be logged in to access this page.');
        }
    }

    // Handle the song upload and store the data in the database
    public function store(Request $request)
    {
        
            
        
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'file' => 'required|mimes:mp3,wav,ogg|max:10240', // 10 MB max
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('songs', 'public');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create a new song record in the database
        Song::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'file_path' => $filePath,
            'img_path' => $imagePath,
        ]);

        // Redirect back to the song list with a success message
        return redirect('/')->with('success', 'Song uploaded successfully!');
        
    }

    public function search(Request $request)
    {
        // Validate the search query
        $query = $request->input('query');

        // Search for songs by title or artist
        $songs = Song::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('artist', 'LIKE', "%{$query}%")
                     ->get();

        // Return the search results to the view
        return view('welcome', compact('songs', 'query'));
    }
}
