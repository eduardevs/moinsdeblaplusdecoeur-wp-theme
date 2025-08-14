<?php get_template_part("parts/plus_de_coeur") ?>



<section id="qui-sommes-nous?" class="relative bg-stone-950 text-white">
    <div class="max-w-7xl mx-auto px-20 min-h-[60vh]">

        <!-- Title with AOS effect -->
        <h2 class="text-4xl font-extrabold text-center text-[#65cfc7] mb-16 uppercase tracking-wide leading-[3rem] md:leading-none sm:mb-12"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="300" data-aos-easing="ease-in-out">
            Qui sommes-nous ?
        </h2>

        <!-- Two Columns Layout -->
        <div class="flex flex-col md:flex-row gap-12 items-center">

            <!-- Left Column (Image) -->
            <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1500"
                data-aos-delay="500" data-aos-easing="ease-in-out">
                <div class="relative w-72 h-72 md:w-96 md:h-96 shadow-lg">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/front-2.jpg'; ?>"
                        alt="Qui sommes-nous ?"
                        class="w-full h-full object-cover rounded-full border-teal-500 border-4 aspect-square">
                </div>
            </div>

            <!-- Right Column (List) -->
            <div class="w-full md:w-1/2 flex flex-col gap-8" data-aos="fade-left" data-aos-duration="1500"
                data-aos-delay="700" data-aos-easing="ease-in-out">
                <ul class="space-y-4 text-lg leading-relaxed">
                    <li class="flex items-start gap-3">
                        <span class="text-[#65cfc7] text-2xl">➤</span>
                        Une <span class="font-semibold break-words">association loi 1901</span> d'intérêt général.
                    </li>
                    <li class="flex items-start gap-3" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-[#65cfc7] text-2xl">➤</span>
                        <span>Un mouvement <span class="font-semibold">protestant ouvert à tous</span>, et
                            intergénérationnel.</span>
                    </li>
                    <li class="flex flex-col gap-3" data-aos="fade-up" data-aos-delay="600">
                        <div class="flex items-start gap-3">
                            <span class="text-[#65cfc7] text-2xl">➤</span>
                            Un <span class="font-semibold">réseau international</span> :
                        </div>
                        <ul class="list-disc list-inside text-gray-400 pl-6 space-y-1">
                            <li data-aos="fade-up" data-aos-delay="800">Présent dans <span class="font-semibold">20
                                    pays</span> d'Amérique Latine et aux USA.</li>
                            <li data-aos="fade-up" data-aos-delay="1200">Fondé en France en <span
                                    class="font-semibold">2021</span>, avec le soutien de plusieurs églises évangéliques
                                de la région Occitanie et du réseau.</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>