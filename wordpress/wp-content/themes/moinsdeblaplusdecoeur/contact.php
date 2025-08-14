<?php
/*
Template Name: Page Contact
Template Post Type: page, post
*/

get_header(); ?>

<section class="py-20 bg-stone-950 text-black">
    <div class="max-w-4xl mx-auto px-6 py-32">
        <h2 class="text-4xl font-extrabold text-center text-[#65cfc7] uppercase tracking-wide" data-aos="fade-up">
            <?php the_title(); ?>
        </h2>
        <?php if (isset($_GET['form_submitted']) && $_GET['form_submitted'] === 'true'): ?>
            <div class="bg-green-500 text-white p-4 rounded-lg text-center">
                <p>✅ Merci ! Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.</p>
                <p>
                    <a href="<?php echo get_home_url(); ?>"
                        class="inline-block bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                        ⬅️ Retour à l'accueil
                    </a>

                </p>
            </div>


            <?php
            // Remove query parameter to prevent the message from showing after refresh
            wp_safe_redirect(remove_query_arg('form_submitted'));
            exit;
            ?>
        <?php endif; ?>

        <form method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg space-y-4">
            <!-- Champs en 2 Colonnes -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nom -->
                <div class="relative">
                    <label for="name" class="block text-sm font-medium text-gray-900">Nom</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[rgb(101,207,199)] focus:border-[rgb(101,207,199)] focus:outline-none">
                </div>

                <!-- Email -->
                <div class="relative">
                    <label for="email" class="block text-sm font-medium text-gray-900">Adresse Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[rgb(101,207,199)] focus:border-[rgb(101,207,199)] focus:outline-none">
                </div>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                <textarea id="message" name="message" rows="4" required
                    class="mt-1 block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[rgb(101,207,199)] focus:border-[rgb(101,207,199)]"
                    placeholder="Votre message ici..."></textarea>
            </div>

            <div class="g-recaptcha" data-sitekey="6LfkGPgqAAAAAAjG2kh8R1RdyqVcNThSuYh4sXSp"></div>
            <div class="flex justify-center">

                <button type="submit"
                    class=" bg-[rgb(101,207,199)] text-black font-medium rounded-lg px-5 py-2.5 text-center hover:bg-[rgb(85,190,182)] transition duration-200">
                    Envoyer le message
                </button>
            </div>

        </form>
    </div>
</section>






<?php get_footer(); ?>