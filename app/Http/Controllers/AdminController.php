<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    // Method to display users
    public function manageUsers(Request $request)
    {
        $userSearch = $request->input('user_search');
        $users = User::when($userSearch, function ($query, $userSearch) {
            return $query->where('name', 'like', "%{$userSearch}%")
                         ->orWhere('email', 'like', "%{$userSearch}%");
        })->paginate(5);

        return view('admin.manage-users', compact('users'));
    }

    // Method to display songs
    public function manageSongs(Request $request)
    {
        $songSearch = $request->input('song_search');
        $songs = Song::when($songSearch, function ($query, $songSearch) {
            return $query->where('title', 'like', "%{$songSearch}%")
                         ->orWhere('artist', 'like', "%{$songSearch}%");
        })->paginate(5);

        return view('admin.manage-songs', compact('songs'));
    }

    public function manageMessage(Request $request)
    {
        $MessageSearch = $request->input('message_search');
        $messages = ContactMessage::when($MessageSearch, function ($query, $MessageSearch) {
            return $query->where('name', 'like', "%{$MessageSearch}%")
                         ->orWhere('email', 'like', "%{$MessageSearch}%");
        })->paginate(5);

        return view('admin.manage-messages', compact('messages'));
    }

    // Method to delete a user
    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully');
    }

    // Method to delete a song
    public function deleteSong($id)
    {
        Song::find($id)->delete();
        return redirect()->route('admin.manageSongs')->with('success', 'Song deleted successfully');
    }

    public function deleteMessage($id)
    {
        ContactMessage::find($id)->delete();
        return redirect()->route('admin.manageMessages')->with('success', 'Message deleted successfully');
    }
}
