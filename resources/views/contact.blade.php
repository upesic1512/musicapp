@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/about-contact.css') }}">
</head>
<body>

   

    
<main class="contact-container">

    @if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

    <h1>Contact Us</h1>
    <p>If you have any questions, suggestions, or issues, feel free to reach out to us using the form below.</p>

   
   
    

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="contact-button">Send Message</button>
    </form>
</main>
</body>
</html>
