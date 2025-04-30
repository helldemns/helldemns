<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.0.4 | Not Found</title>

    <!-- Link ke CSS -->
    <link rel="stylesheet" href="{{ asset('css/404.css') }}">
</head>

<body>
    <h1>Not Found</h1>
    <h2>warning!!!</h2>
    <p>Scumbag... Return To Previous Page Before I will drag you to hell</p>

    <a href="{{ url('/produk') }}" class="button">Back to Page</a>
    <!-- Audio Kenpachi -->
    <audio id="kenpachiSound" preload="auto">
        <source src="{{ asset('sounds/kenpachi.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Auto Play Audio on Click -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.getElementById('kenpachiSound');
            let hasPlayed = false;

            document.body.addEventListener('click', function() {
                if (!hasPlayed) {
                    hasPlayed = true;
                    audio.play().catch((error) => {
                        console.error('Error playing audio:', error);
                    });
                }
            });
        });
    </script>
</body>
</html>
