<?php
// Fetch gallery images from custom post meta
$gallery_images = get_post_meta(get_the_ID(), 'projet_gallery', true);

if (!empty($gallery_images) && is_array($gallery_images)): ?>
    <section class="px-4 py-12 max-w-7xl mt-20 mx-2 md:mx-auto">
        <!-- Image Grid -->
        <ul class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">
            <?php foreach ($gallery_images as $index => $image): ?>
                <li class="flex-shrink-0">
                    <img src="<?php echo esc_url($image); ?>"
                        class="object-cover w-full h-40 bg-gray-200 rounded cursor-pointer" alt="Gallery Image"
                        onclick="openModal(<?php echo $index; ?>)">
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    </div>

    <!-- Modal structure -->
    <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center hidden">
        <div class="relative w-full h-full flex justify-center items-center" onclick="closeModal(event)">
            <img id="modal-image" class="max-w-full max-h-full object-contain" src="" alt="Image Enlarged"
                onclick="event.stopPropagation()">

            <!-- Navigation buttons -->
            <div class="absolute bottom-10 flex justify-between w-full px-4">
                <button onclick="changeImage(-1); event.stopPropagation()" class="text-white text-4xl font-bold md:w-1/3">
                    <span
                        class="inline-flex items-center justify-center w-10 h-10  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>

                <button onclick="changeImage(1); event.stopPropagation()" class="text-white text-4xl font-bold md:w-1/3">
                    <span
                        class="inline-flex items-center justify-center w-10 h-10  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </div>

        <script>
            // Gallery images from PHP
            const images = <?php echo json_encode($gallery_images); ?>;
            let currentIndex = -1;

            // Open the modal with a specific image
            function openModal(index) {
                currentIndex = index;
                document.getElementById('modal-image').src = images[currentIndex];
                document.getElementById('modal').classList.remove('hidden');
            }

            // Close the modal
            function closeModal(event) {
                event.stopPropagation();
                document.getElementById('modal').classList.add('hidden');
            }

            // Navigate through images
            function changeImage(direction) {
                currentIndex = (currentIndex + direction + images.length) % images.length;
                document.getElementById('modal-image').src = images[currentIndex];
            }
        </script>
    <?php endif; ?>