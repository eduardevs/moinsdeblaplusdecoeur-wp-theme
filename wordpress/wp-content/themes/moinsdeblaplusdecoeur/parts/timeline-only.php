<div class="text-white overflow-hidden py-32">
  <section id="timeline" class="relative z-30 max-w-6xl mx-auto">
    <h1 class="text-4xl font-bold text-center mb-16 text-[#65cfc7] uppercase tracking-wide">Actions</h1>

    <div class="max-w-4xl mx-auto space-y-16">
      <?php
      $actions = [
        [
          "title" => "Un Coeur Pour Mon Quartier",
          "description" => "Animation pour enfants, soutien scolaire, activités familiales",
          "image" => "moinsdebla_enfants.jpeg"
        ],
        [
          "title" => "Un Coeur Pour Mon Quartier",
          "description" => "Animation pour enfants, soutien scolaire, activités familiales",
          "image" => "moinsdebla_enfants2.jpg"
        ],
        [
          "title" => "QuartierPropre",
          "description" => "Opérations de nettoyage de zones insalubres de la ville.",
          "image" => "moinsdebla_quartierpropre.jpg"
        ],
        [
          "title" => "QuartierPropre",
          "description" => "Opérations de nettoyage de zones insalubres de la ville.",
          "image" => "moinsdebla_quartierpropre2.jpg"
        ],
        [
          "title" => "Tous Migrants",
          "description" => "Animation pour les enfants réfugiés ; ateliers de soins aux femmes ; musique ; activités sportives et culturelles",
          "image" => "moinsdebla_soins-de-femmes.jpeg"
        ],
        [
          "title" => "Messages du Coeur",
          "description" => "Ateliers artistiques et créatifs porteurs d'espoir (mime, etc.)",
          "image" => "moinsdebla_mimes.jpg"
        ],
        [
          "title" => "Maraudes",
          "description" => "Distribution de vêtements, collations, et point d'écoute envers les plus démunis.",
          "image" => "moinsdebla_maraudes.jpg"
        ]
      ];
      ?>

      <?php foreach ($actions as $index => $action):
        $aos_animation = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
        $reverse_layout = ($index % 2 != 0) ? 'sm:flex-row-reverse' : 'sm:flex-row';
        ?>
        <div class="flex flex-col <?php echo $reverse_layout; ?> items-center gap-8"
          data-aos="<?php echo $aos_animation; ?>">

          <!-- Image Block (rond) -->
          <div class="w-40 h-40 flex-shrink-0">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/' . $action['image']; ?>" alt="Formation"
              class="w-full h-full object-cover rounded-full shadow-lg border-4 border-[#65cfc7] transition-transform duration-300 hover:scale-105 cursor-pointer"
              onclick="openModal('<?php echo get_template_directory_uri() . '/assets/images/' . $action['image']; ?>')">
          </div>

          <!-- Content Block -->
          <div
            class="flex-1 border border-[#65cfc7] bg-white bg-opacity-10 backdrop-blur-lg p-6 rounded-xl shadow-lg transition duration-300 hover:bg-opacity-20">
            <h2 class="text-2xl font-bold text-[#65cfc7] mb-2"><?php echo $action['title']; ?></h2>
            <?php if (!empty($action['description'])): ?>
              <p class="text-gray-300"><?php echo $action['description']; ?></p>
            <?php endif; ?>
          </div>

        </div>
      <?php endforeach; ?>


    </div>
  </section>
</div>

<!-- Modal structure -->


<!-- Modal structure -->
<div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center hidden">
  <div class="relative w-full h-full flex justify-center items-center" onclick="closeModal(event)">

    <!-- Image displayed inside the modal -->
    <img id="modal-image" class="max-w-full max-h-full object-contain" src="" alt="Image Enlarged" onclick="event.stopPropagation()">

    <!-- Arrow buttons container, positioned below the image -->
    <div class="absolute bottom-10 flex justify-between w-full px-4">
      <!-- Left arrow -->
      <button onclick="changeImage(-1); event.stopPropagation()" class="text-white text-4xl font-bold w-1/4">←</button>

      <!-- Right arrow -->
      <button onclick="changeImage(1); event.stopPropagation()" class="text-white text-4xl font-bold w-1/4">→</button>
    </div>

    <!-- Close button -->
    <button onclick="closeModal(); event.stopPropagation()" class="absolute top-5 right-5 text-white text-3xl font-bold z-20">×</button>
  </div>
</div>



<script>

  // Array of image sources (paths)
  const images = [
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_enfants.jpeg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_enfants2.jpg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_quartierpropre.jpg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_quartierpropre2.jpg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_soins-de-femmes.jpeg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_mimes.jpg"; ?>',
    '<?php echo get_template_directory_uri() . "/assets/images/moinsdebla_maraudes.jpg"; ?>'
  ];

  // Current image index
  let currentIndex = -1;

  // Open the modal with the specific image
  function openModal(imageSrc) {
    // Set the image source
    document.getElementById('modal-image').src = imageSrc;

    // Set the initial index based on the clicked image
    currentIndex = images.indexOf(imageSrc);

    // Show the modal
    document.getElementById('modal').classList.remove('hidden');
  }

  // Close the modal
  function closeModal(event) {
    // Stop event propagation to prevent accidental closing from image clicks
    event.stopPropagation();
    document.getElementById('modal').classList.add('hidden');
  }

  // Change the image (left or right)
  function changeImage(direction) {
    currentIndex += direction;

    // Loop through images
    if (currentIndex < 0) {
      currentIndex = images.length - 1;
    } else if (currentIndex >= images.length) {
      currentIndex = 0;
    }

    // Set the new image source
    document.getElementById('modal-image').src = images[currentIndex];
  }
</script>

<script>
  AOS.init({
    duration: 1000, // Animation duration (1s)
    easing: 'ease-in-out',
    once: true // Animates only once
  });
</script>