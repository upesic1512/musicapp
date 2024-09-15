
@extends("layouts.layout")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song - Spotify Style</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    
</head>
<body>

    <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data" class="form">
        <h1>Upload a New Song</h1>

        @csrf

        <div>
            <label for="title">Song Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" required>
        </div>

        <div>
            <label for="file" class="custom-file-label">Choose Song File</label>
            <input type="file" name="file" id="file" accept="audio/*" required>
        </div>
        
        <div>
            <label for="image" class="custom-file-label">Choose Image</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <div>
            <button type="submit">Upload</button>
        </div>
    </form>

    

</body>
</html>

<script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const label = this.previousElementSibling;
            if (this.files.length > 0) {
                label.textContent = this.files[0].name;
            } else {
                label.textContent = 'Choose File';
            }
        });
    });
</script>
