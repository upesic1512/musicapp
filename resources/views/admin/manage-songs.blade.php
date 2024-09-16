@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Songs</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
</head>

<body>
<div class="spotify-admin-dashboard">
    <h1>Manage Songs</h1>


    <form action="{{ route('admin.manageSongs') }}" method="GET" class="search-form">
        <input type="text" name="song_search" placeholder="Search for songs" value="{{ request('song_search') }}">
        <button type="submit" class="spotify-button">Search</button>
    </form>

    <table class="spotify-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
                <tr>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->artist }}</td>
                    <td>
                        <form action="{{ route('admin.deleteSong', $song->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="spotify-button delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <div class="mx-auto pb-10 w-4/5">
        {{ $songs->links('pagination::default')}}
        
    </div>
    
</div>
</body>
</html>
