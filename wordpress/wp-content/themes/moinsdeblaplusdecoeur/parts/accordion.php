<style>
    /* Empêcher le scroll temporaire pendant l'animation */

</style>
<div class="mx-auto mt-10 max-w-screen-lg px-4">
    <?php
    $objectives = [
        "Responsabiliser la jeunesse" => "envers les problématiques sociales et transculturelles, en proposant des espaces de service solidaire.",
        "Répondre aux besoins sociaux" => "en accompagnant, en valorisant et en responsabilisant les personnes et communautés vulnérables.",
        "Encourager l’engagement solidaire" => "entre les diverses communautés et classes sociales.",
        "Développer des espaces d’expression artistique" => "visant à favoriser les liens sociaux et à rompre les stéréotypes, les phénomènes d'isolement et de rupture sociale."
    ];
    ?>

    <!-- Main Title -->
    <h2 id='objetifs'
        class="your-section-class text-4xl font-extrabold text-right text-[#65cfc7] uppercase tracking-wide pb-10"
        data-aos="fade-left" data-aos-duration="1000">
        Nos Objectifs
    </h2>

    <div class="space-y-4 mt-10 overflow-hidden">
        <?php $index = 0; ?>
        <?php foreach ($objectives as $title => $content): ?>
            <div class="border border-gray-300 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="<?php echo $index * 200; ?>"
            data-aos-duration="1000">

                <!-- Title (Stays above) -->
                <button
                    class="w-full flex justify-between items-center px-4 py-3 text-lg font-semibold focus:outline-none toggle-btn"
                    data-index="<?php echo $index; ?>">
                    <span><?php echo esc_html($title); ?></span>
                    <span class="toggle-icon text-2xl font-bold transition-transform duration-300 text-red-500">+</span>
                </button>

                <!-- Collapsible Content (Centered & Styled) -->
                <div class="toggle-content overflow-hidden transition-all duration-500 ease-in-out"
                    style="max-height: <?php echo ($index === 0) ? '500px' : '0px'; ?>; overflow: visible; word-wrap: break-word; white-space: normal;">
                    <div
                        class="px-6 py-4 bg-gray-800 text-white text-lg text-center leading-relaxed rounded-b-lg shadow-md">
                        <?php echo esc_html($content); ?>
                    </div>
                </div>
            </div>
            <?php $index++; ?>
        <?php endforeach; ?>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButtons = document.querySelectorAll(".toggle-btn");

        toggleButtons.forEach((button, index) => {
            const content = button.nextElementSibling;
            const icon = button.querySelector(".toggle-icon");

            // Open first section by default
            if (index === 0) {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.textContent = "−";
                icon.classList.remove("text-red-500");
                icon.classList.add("text-white");
                button.classList.add("active");
            }

            button.addEventListener("click", function () {
                const isOpen = content.style.maxHeight !== "0px" && content.style.maxHeight !== "";

                // Close all sections
                toggleButtons.forEach((btn, i) => {
                    const btnContent = btn.nextElementSibling;
                    const btnIcon = btn.querySelector(".toggle-icon");

                    btnContent.style.maxHeight = "0px";
                    btnIcon.textContent = "+";
                    btnIcon.classList.remove("text-white");
                    btnIcon.classList.add("text-red-500");
                    btn.classList.remove("active");
                });

                // If the clicked section was open, open the next one instead
                if (isOpen) {
                    const nextIndex = (index + 1) % toggleButtons.length;
                    const nextButton = toggleButtons[nextIndex];
                    const nextContent = nextButton.nextElementSibling;
                    const nextIcon = nextButton.querySelector(".toggle-icon");

                    nextContent.style.maxHeight = nextContent.scrollHeight + "px";
                    nextIcon.textContent = "−";
                    nextIcon.classList.remove("text-red-500");
                    nextIcon.classList.add("text-white");
                    nextButton.classList.add("active");
                } else {
                    // Open the clicked section
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.textContent = "−";
                    icon.classList.remove("text-red-500");
                    icon.classList.add("text-white");
                    button.classList.add("active");
                }
            });
        });
    });
</script>