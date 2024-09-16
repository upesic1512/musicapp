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


    <form action="{{ route('admin.manageMessages') }}" method="GET" class="search-form">
        <input type="text" name="Message_search" placeholder="Search for Messages" value="{{ request('message_search') }}">
        <button type="submit" class="spotify-button">Search</button>
    </form>

    <table class="spotify-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email}}</td>
                    <td>{{ $message->message}}</td>
                    <td>
                        <form action="{{ route('admin.deleteMessage', $message->id) }}" method="POST">
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
        {{ $messages->links('pagination::default')}}
        
    </div>
    
</div>
</body>
</html>
