<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicApp Layout</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>  
<body>
    <header>
        <nav>
            <div class="nav-links">

            
            <ul class="left-nav">
                <h1>MusicApp</h1>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <ul class="right-nav">
                @auth
                    <li><a href="{{ route('songs.create') }}">Create a New Song</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('register') }}">Sign up</a></li>
                    <li><a href="{{ route('login') }}">Log in</a></li>
                @endauth
                
                <span class="user-greeting">@auth
                    Hello {{auth()->user()->name}}!
                @endauth</span>
            </ul>

        </div>
            
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <footer id="footer">
        <p>&copy; 2024 MusicApp. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const burger = document.querySelector('.burger');
        const navLinks = document.querySelector('.nav-links');
    
        burger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            burger.classList.toggle('toggle');
    });
});

    </script>
</body>
</html>
