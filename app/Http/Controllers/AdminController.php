<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Song;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin dashboard showing users and songs
    public function dashboard()
    {
        $users = User::all();
        $songs = Song::all();
        return view('admin.dashboard', compact('users', 'songs'));
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    // Delete a song
    public function deleteSong($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Song deleted successfully.');
    }
}
