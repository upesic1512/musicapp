@extends('layouts.layout')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Users</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
   
</head>

<body>
<div class="spotify-admin-dashboard">
    <h1>Manage Users</h1>

   
    <form action="{{ route('admin.manageUsers') }}" method="GET" class="search-form">
        <input type="text" name="user_search" placeholder="Search for users" value="{{ request('user_search') }}">
        <button type="submit" class="spotify-button">Search</button>
    </form>

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

   
    <div class="mx-auto pb-10 w-4/5">
        {{ $users->links('pagination::default')}}
        
    </div>
</div>
</body>
