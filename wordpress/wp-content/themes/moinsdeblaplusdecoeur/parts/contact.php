<section id="contact" class="bg-stone-950 text-white">
    <!-- Titre avec effet fade-up -->
    <h2 class="text-4xl font-extrabold text-center text-[#65cfc7] uppercase tracking-wide" data-aos="fade-up"
        data-aos-duration="1000">
        Contact
    </h2>
    <p class="text-lg text-center text-gray-300 mt-10" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        Nous sommes à votre écoute, n'hésitez pas à nous contacter.
    </p>
    <div class="max-w-4xl mx-auto px-6 py-20 overflow-hidden">

        <!-- Formulaire avec effet fade-up et délai -->
        <form id="contact-form" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg space-y-4" data-aos="fade-up"
            data-aos-duration="1000">

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

            <!-- Message -->
            <div data-aos="fade-up">
                <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                <textarea id="message" name="message" rows="4" required
                    class="mt-1 block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[rgb(101,207,199)] focus:border-[rgb(101,207,199)]"
                    placeholder="Votre message ici..."></textarea>
            </div>

            <!-- CAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LdgV_8qAAAAAPeSmm7KXQWGeNZHrQBsnvArZGRE"></div>

            <!-- Bouton Envoyer -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-[rgb(101,207,199)] text-black font-medium rounded-lg px-5 py-2.5 text-center hover:bg-[rgb(85,190,182)] transition duration-200">
                    Envoyer le message
                </button>
            </div>

        </form>

        <!-- Success/Failure message with a link to scroll to the top -->
        <div id="form-message" class="hidden p-4 mt-4 text-center space-y-4">
            <!-- Success or Failure message will appear here -->
            <p id="success-message" class="text-lg text-white"></p>
            <a id="but" href="<?= esc_url(home_url('/')) ?>"
                class="inline-block mt-4 text-white font-bold hover:text-teal-600 text-lg">Retour à l'accueil</a>
        </div>

    </div>
</section>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("#contact-form");
        const messageDiv = document.querySelector("#form-message");
        const goToTopButton = document.querySelector("#but");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Prepare form data
            const formData = new FormData(form);
            formData.append("action", "handle_form_submission"); // Required for WordPress AJAX

            fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    messageDiv.classList.remove("hidden");
                    if (data.success) {
                        messageDiv.classList.add("bg-teal-500", "text-white");
                        document.querySelector("#success-message").innerHTML = data.data.message;
                        form.remove(); // Remove the form after successful submission

                        // Show the "Go to Top" button
                        goToTopButton.classList.remove("hidden");
                    } else {
                        messageDiv.classList.add("bg-red-500", "text-white");
                        messageDiv.innerHTML = data.data.message;
                    }
                })
                .catch(error => {
                    messageDiv.classList.remove("hidden");
                    messageDiv.classList.add("bg-red-500", "text-white");
                    messageDiv.innerHTML = "❌ Une erreur s'est produite. Veuillez réessayer.";
                });
        });
    });

</script>