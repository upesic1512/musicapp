@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    

</head>

<body>
    
    <div class="spotify-admin-dashboard">
        <h1 class="bodyh1">Admin Dashboard</h1>
    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        
        <section class="admin-section">
            <h2>Manage Users</h2>
            <table class="spotify-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="spotify-button delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    
        
        <section class="admin-section">
            <h2>Manage Songs</h2>
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
        </section>
    </div>
   
    
</body>