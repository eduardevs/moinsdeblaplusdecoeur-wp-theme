<?php wp_footer() ?>

<div class="bg-stone-950 bg-black text-secondary p-20 mt-10">

    <div class="flex flex-col items-center justify-center">

        <!-- Text Section -->
        <div class="text-center mb-4">
            <p class="text-white text-lg">
                MOINS DE BLA PLUS DE COEUR est une association loi 1901 d'intérêt general
            </p>
        </div>
        <!-- bg-[#1f766f] -->
        <div class="social p-x-15 py-5 text-white rounded-lg flex justify-between items-center space-x-8">
            <a href="https://www.instagram.com/moinsdeblaplusdecoeur_officiel/" class="text-3xl" target="_blank">
                <i class="fa-brands fa-square-instagram"></i>
            </a>
            <a href="https://www.facebook.com/p/Moins-de-Bla-Plus-de-Coeur-100068120906412/" class="text-3xl"
                target="_blank">
                <i class="fa-brands fa-square-facebook"></i>
            </a>
            <a href="<?= get_home_url() . "/#contact" ?>" class="text-3xl">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>

        <!-- Logo Section -->
        <div class="mx-auto">
            <?php get_template_part('parts/container-logo'); ?>
        </div>
    </div>

    </body>

    </html>