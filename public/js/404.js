window.addEventListener('load', function() {
    const kenpachiSound = document.getElementById('kenpachi-sound');
    const typingText = document.getElementById('typing-text');
    const flash = document.querySelector('.flash');

    let text = "You just met Kenpachi!";
    let index = 0;
    let isSoundPlayed = false;

    function type() {
        if (index < text.length) {
            typingText.innerHTML += text.charAt(index);
            index++;
            setTimeout(type, 100); // Typing speed 100ms per huruf
        }
    }

    function playSound() {
        kenpachiSound.play().catch((error) => {
            console.error('Gagal play Kenpachi Sound:', error);
        });
        triggerFlash();
    }

    function triggerFlash() {
        flash.style.opacity = 1;
        setTimeout(() => {
            flash.style.opacity = 0;
        }, 300);
    }

    // User klik baru mulai play sound + flash
    document.body.addEventListener('click', function() {
        if (!isSoundPlayed) {
            playSound();
            isSoundPlayed = true;

            // Tunggu 3 detik baru redirect
            setTimeout(function() {
                window.location.href = "/";
            }, 3000);
        }
    });

    type();
});
