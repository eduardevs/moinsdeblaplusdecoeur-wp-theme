<!-- Audio Player -->
<audio id="audio1" preload="auto">
    <source src="<?php echo get_template_directory_uri() . '/assets/audio/rend-collective_good-news.mp3' ?>" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Play/Pause Button -->
<button id="playPauseButton" class="px-4 py-2 text-lg text-white rounded-lg transition flex items-center">
    <i id="playIcon" class="fas fa-play mr-2"></i>
    <span id="songTitle" class="song-title">Écoute Good News - Rend Collective</span>
</button>

<!-- Styles for Animation -->
<style>
    /* Style de l'animation pour le titre */
    .song-title {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        opacity: 0;
        /* Le texte est invisible au début */
        transform: translateX(100%);
        /* Commence hors de l'écran à droite */
        animation: slideIn 3s ease-out forwards;
        /* Animation du titre */
    }

    /* Animation: déplacer de la droite vers la gauche */
    @keyframes slideIn {
        0% {
            opacity: 0;
            transform: translateX(100%);
            /* Commence à droite */
        }

        100% {
            opacity: 1;
            transform: translateX(0);
            /* Position finale à gauche */
        }
    }
</style>

<!-- Script for Play/Pause Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const audio = document.getElementById('audio1');
        const playPauseButton = document.getElementById('playPauseButton');
        const playIcon = document.getElementById('playIcon');
        const songTitle = document.getElementById('songTitle');

        // Lorsque la page est chargée, le titre apparaît de la droite
        songTitle.style.animation = 'slideIn 3s ease-out forwards';

        // Set up play/pause toggle
        playPauseButton.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                playIcon.classList.remove('fa-play');
                playIcon.classList.add('fa-pause');
            } else {
                audio.pause();
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
            }
        });
    });
</script>
