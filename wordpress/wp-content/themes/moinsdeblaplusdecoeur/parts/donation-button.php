<?php
/**
 * Donation/Support Button Component
 * Bouton fixe collé à droite de la page
 */
?>

<!-- Bouton de don/soutien fixe -->
<div class="fixed right-0 top-1/2 transform -translate-y-1/2 z-50">
    <a
        id="donationButton"
        href="https://www.helloasso.com/associations/moins-de-bla-plus-de-coeur/formulaires/1"
        target="_blank"
        rel="noopener noreferrer"
        class="bg-[#65cfc7] hover:bg-[#54b3a7] text-white px-4 py-6 rounded-l-lg shadow-lg transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl group block"
        title="Nous soutenir"
    >
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-hand-holding-heart text-2xl group-hover:animate-pulse"></i>
            <span class="text-sm font-bold writing-mode-vertical transform -rotate-90 whitespace-nowrap">
                SOUTENIR
            </span>
        </div>
    </a>
</div>

<script>
// Animation au scroll (optionnel)
window.addEventListener('scroll', function() {
    const button = document.getElementById('donationButton');
    if (window.scrollY > 200) {
        button.classList.add('animate-bounce');
        setTimeout(() => {
            button.classList.remove('animate-bounce');
        }, 2000);
    }
});
</script>

<style>
/* Style pour le texte vertical */
.writing-mode-vertical {
    writing-mode: vertical-rl;
    text-orientation: mixed;
}

/* Animation personnalisée pour l'effet de pulsation */
@keyframes heartbeat {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

#donationButton:hover i {
    animation: heartbeat 1s infinite;
}

/* Responsive - cacher sur très petits écrans */
@media (max-width: 640px) {
    #donationButton {
        padding: 12px 8px;
    }

    #donationButton span {
        font-size: 10px;
    }

    #donationButton i {
        font-size: 18px;
    }
}
</style>
