<section id="accueil" class="hero relative flex items-center justify-center h-[300px] bg-stone-950 text-white py-30">

    <!-- Overlay Content -->
    <div class="relative z-10 text-center px-6 max-w-4xl mx-auto  mt-40">
        <!-- <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
            <span id="bla" class="fade-in">-Bla</span>
            <span id="coeur" class="text-red-500 fade-in">+Coeur</span>
        </h1> -->
        <div class="w-full flex justify-center mb-12">
            <h1 class="text-5xl font-bold">
                <?php if (has_custom_logo()):
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full'); ?>
                    <a href="<?php echo get_home_url(); ?>" class="text-white no-underline hover:underline">
                        <img src="<?php echo $custom_logo_url; ?>" alt="Logo" class="h-30 mx-auto">
                    </a>
                <?php endif; ?>
            </h1>
        </div>


        <!-- <p class="text-lg md:text-xl text-gray-200 mb-8">
            L'amour en action, la foi en mouvement.
        </p> -->
        <p id="typingText" class="text-lg md:text-xl text-gray-200 mb-8 font-cursive tracking-wide"
            data-text="L'amour en actes, et en vérité."></p>


        <a href="#projets"
            class="inline-block px-8 py-4 text-lg font-semibold bg-[#65cfc7] text-white rounded-lg shadow-lg hover:bg-[#4aa6a0] transition duration-300 z-index-10">
            Voir les projets
        </a>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const textElement = document.getElementById("typingText");
        const text = textElement.dataset.text;
        let index = 0;

        // Ajoute la classe "visible" pour rendre le texte opaque avant d'écrire
        textElement.classList.add("visible");

        function typeText() {
            if (index < text.length) {
                textElement.innerHTML += text[index];
                index++;
                setTimeout(typeText, 100); // Ajuste la vitesse ici
            }
        }

        setTimeout(typeText, 800); // Délai avant de commencer l’effet
    });


    // just test
    document.addEventListener("DOMContentLoaded", function () {
        const bla = document.getElementById("bla");
        const coeur = document.getElementById("coeur");

        // Affiche "-Bla" en premier
        setTimeout(() => {
            bla.classList.add("visible");
        }, 500); // 500ms après le chargement

        // Affiche "+Coeur" avec un délai supplémentaire
        setTimeout(() => {
            coeur.classList.add("visible");
        }, 1500); // 1500ms après le chargement
    });
</script>