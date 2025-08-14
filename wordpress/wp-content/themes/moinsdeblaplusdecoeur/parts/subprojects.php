<?php

$sousprojets = [];
$index = 1;

while (true) {
    $champ = get_field("sousprojet_$index");
    if (!$champ) {
        break;
    }
    $sousprojets[] = $champ;
    $index++;
}


foreach ($sousprojets as $projet):
    if (!$projet)
        continue;

    $titre = $projet['titre'];
    $description = $projet['description'];
    $objetif1 = $projet['objetif_1'];
    $objetif2 = $projet['objetif_2'];
    $objetif3 = $projet['objetif_3'];
    $img1 = $projet['image_1'];
    $img2 = $projet['image_2'];
    $img3 = $projet['image_3'];
    ?>
    <div class="article_content mx-auto max-w-screen-lg py-8 mt-10">
        <div class="mb-16 px-4">
            <h2 class="text-3xl font-bold pb-6 text-center">
                <?= esc_html($titre) ?>
            </h2>
            <div class="prose lg:prose-xl leading-relaxed break-words">
                <p class="text-lg text-black mb-8">
                    <?= esc_html($description) ?>
                </p>
            </div>
            <?php if ($objetif1 || $objetif2 || $objetif3): ?>
                <h3 class="pb-3">Objetifs :</h3>

                <ul class="list-disc list-inside space-y-2 mb-8">
                    <?php if ($objetif1): ?>
                        <li><?= esc_html($objetif1) ?></li>
                    <?php endif; ?>
                    <?php if ($objetif2): ?>
                        <li><?= esc_html($objetif2) ?></li>
                    <?php endif; ?>
                    <?php if ($objetif3): ?>
                        <li><?= esc_html($objetif3) ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>

        </div>

        <div class="flex flex-wrap justify-center gap-6">
            <?php if ($img1): ?>
                <img src="<?= esc_url($img1['url']) ?>" alt="Image 1"
                    class="w-72 h-72 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
            <?php endif; ?>

            <?php if ($img2): ?>
                <img src="<?= esc_url($img2['url']) ?>" alt="Image 2"
                    class="w-72 h-72 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
            <?php endif; ?>

            <?php if ($img3): ?>
                <img src="<?= esc_url($img3['url']) ?>" alt="Image 3"
                    class="w-72 h-72 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
            <?php endif; ?>
        </div>
    </div>

<?php endforeach; ?>