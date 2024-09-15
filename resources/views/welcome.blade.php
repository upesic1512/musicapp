@extends("layouts.layout")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music App</title>
    <link rel="stylesheet" href='{{ asset('css/styles.css') }}'>
</head>
<body>
    
    <main>
        <form action="{{ route('songs.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search for songs" required>
            
            <button type="submit">
                <img src="{{asset('storage/icons/search.svg')}}" alt="Search">
            </button>
        </form>
        
        
        
        <ul class="song-list">
            @foreach ($songs as $song)
                <li class="song-item">
                    @if ($song->img_path)
                        <div class="song-image-container">
                            <img src="{{ asset('storage/' . $song->img_path) }}" alt="{{ $song->title }} cover">
                            <button class="play-button"
                       data-title="{{ $song->title }}"
                       data-artist="{{ $song->artist }}"
                       data-audio="{{ asset('storage/' . $song->file_path) }}"
                       data-image="{{ asset('storage/' . $song->img_path) }}"> 
                       ⏵
                    </button>
                        </div>
                    @endif
                    <strong>{{ $song->title }}</strong> by {{ $song->artist }}
                    <br>
                </li>
            @endforeach
        </ul>

        <div id="audio-player" class="audio-player hidden">
            <div class="player-info">
                <img id="player-img" src="" alt="Album Cover">
                <div>
                    <h3 id="player-title">Song Title</h3>
                    <p id="player-artist">Artist Name</p>
                </div>
            </div>
            <audio id="audio" controls></audio>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const playButtons = document.querySelectorAll('.play-button');
    const audioPlayer = document.getElementById('audio-player');
    const audioElement = document.getElementById('audio');
    const playerTitle = document.getElementById('player-title');
    const playerArtist = document.getElementById('player-artist');
    const playerImg = document.getElementById('player-img');
    const footer = document.getElementById('footer');

    playButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const title = this.getAttribute('data-title');
            const artist = this.getAttribute('data-artist');
            const audioSrc = this.getAttribute('data-audio');
            const imageSrc = this.getAttribute('data-image');

     
            playerTitle.textContent = title;
            playerArtist.textContent = artist;
            playerImg.src = imageSrc;
            audioElement.src = audioSrc;

           
            audioPlayer.classList.add('show');
            audioPlayer.classList.remove('hidden');
            audioElement.play();

          
            footer.style.display = 'none';
        });
    });

    audioElement.addEventListener('pause', function() {
        footer.style.display = 'block'; 
    });

    audioElement.addEventListener('ended', function() {
        footer.style.display = 'block'; 
    });
});

</script>





</body>
</html>
