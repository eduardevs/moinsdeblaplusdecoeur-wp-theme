<?php

// require_once __DIR__ . '/vendor/autoload.php';

// require_once get_template_directory() . '/src/models/Mailer.php'; // Modify the path accordingly

use Webluthier\Models\Mailer;

function my_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    // add_image_size('post-thumbnail', 200, 200, true);

    $defaults = array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}


function enqueue_tailwind()
{
    wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/src/output.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/src/styles.css');
}

function load_custom_fonts()
{
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', false);
}


function enqueue_icons()
{
    wp_enqueue_style('fontawesome', 'https://kit.fontawesome.com/502b87f90c.js', false);
}


/**
 * Register custom post type
 */
function montheme_init()
{
    // register_taxonomy('projets', 'post', [
    //     'labels' => [
    //         'name' => 'Projet',
    //         'singular_name' => 'Projet',
    //         'plural_name' => 'Projet',
    //         'search_items ' => 'Rechercher des projet',
    //         'all_items' => 'Tous les projets',
    //         'edit_item' => 'Editer le projet',
    //         'update_item' => 'Mettre à jour le projet',
    //         'add_new_item' => 'Ajouter un nouveau projet',
    //         'new_item_name' => 'Ajouter un nouveau projet',
    //         "menu_name" => 'Projet',
    //     ],
    //     'show_in_rest' => true,
    //     'hierarchical' => true,
    // ]);
    $labels = array(
        'name' => 'Projets',
        'singular_name' => 'Projet',
        'add_new' => 'Add New Projet',
        'add_new_item' => 'Add New Projet',
        'edit_item' => 'Edit Projet Content',
        'new_item' => 'New Projet Content',
        'all_items' => 'All Projets',
        'view_item' => 'View Projet Content',
        'search_items' => 'Search Projets',
        'not_found' => 'No Projet Contents Found',
        'not_found_in_trash' => 'No Projet Contents found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Projets',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-heart',
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        // 'rewrite' => array('slug' => 'homepage_content'),
        // 'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            // 'trackbacks',
            // 'custom-fields',
            // 'comments',
            // 'revisions',
            'thumbnail',
            'author',
            // 'page-attributes'
        ),
        'show_in_rest' => true,
        'show_in_menu' => true,
    );

    register_post_type('projets', $args);
}

/**
 * Enqueue Font Awesome Kit
 */
function enqueue_fontawesome_kit()
{
    wp_enqueue_script(
        'fontawesome-kit', // Handle for the script
        'https://kit.fontawesome.com/502b87f90c.js', // Font Awesome Kit URL
        [], // Dependencies (none in this case)
        null, // No versioning required
        false // Load in the head section
    );
}


/**
 * Enqueue Google reCAPTCHA
 */
function enqueue_recaptcha()
{
    wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
}

function my_theme_scripts()
{
    // Enqueue script for mobile menu toggle
    wp_enqueue_script('menu-toggle', get_template_directory_uri() . '/src/js/menu-toggle.js', [], false, true);
}
/**
 * Enqueue AOS (Animate on Scroll) library
 */
function enqueue_effect_aos()
{
    // javascript effects
    wp_enqueue_style('animateOnScroll_css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('animateOnScroll_js', 'https://unpkg.com/aos@2.3.1/dist/aos.js');
    // Initialize AOS after it's loaded
    // wp_add_inline_script('animateOnScroll_js', 'AOS.init();');
}

function initialize_aos()
{
    ?>
    <script>
        AOS.init({
            duration: 1000, // Animation duration (1s)
            easing: 'ease-in-out',
            once: true // Animates only once
        });
    </script>
    <?php
}

add_action('wp_footer', 'initialize_aos', 20);
/**
 * Enqueue Flowbite CSS library
 */
function enqueue_flowbite_dependencies()
{
    wp_enqueue_style('flowbite_css', 'https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css');
    wp_enqueue_script('flowbite_js', 'https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js', array(), null, true);
}

add_action("wp_enqueue_scripts", "enqueue_recaptcha");
add_action('wp_enqueue_scripts', 'my_theme_scripts');
add_action('wp_enqueue_scripts', 'enqueue_fontawesome_kit');
add_action('wp_enqueue_scripts', 'enqueue_tailwind');
add_action('wp_enqueue_scripts', 'load_custom_fonts');
add_action("wp_enqueue_scripts", "enqueue_effect_aos");
add_action("wp_enqueue_scripts", "enqueue_flowbite_dependencies");
add_action('after_setup_theme', 'my_theme_setup');
add_action('init', 'montheme_init');


/**
 * Function to handle mailing form submission
 */
function handle_form_submission()
{
    // Check if the form has been submitted and if required fields are present
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['name'], $_POST['message'], $_POST['g-recaptcha-response'])) {

        // Sanitize and validate input data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        $recaptcha_response = sanitize_text_field($_POST['g-recaptcha-response']);

        // Check if the email is valid
        if (!is_email($email)) {
            // Invalid email address, show an error
            wp_send_json_error(['message' => '❌ Adresse email invalide. Veuillez entrer une adresse email valide.']);
            return;
        }

        // Validate the reCAPTCHA response
        $recaptcha_secret = '6LdgV_8qAAAAAAIgGLG-pCNyMedlzQB7rxRPkZ8R'; // Replace with your actual reCAPTCHA secret key
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $response = wp_remote_post($recaptcha_url, [
            'body' => [
                'secret' => $recaptcha_secret,
                'response' => $recaptcha_response,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ]
        ]);

        $recaptcha_result = json_decode(wp_remote_retrieve_body($response));

        // Check if reCAPTCHA validation was successful
        if (empty($recaptcha_result->success) || !$recaptcha_result->success) {
            wp_send_json_error(['message' => '❌ La validation reCAPTCHA a échoué. Veuillez réessayer.']);
            return;
        }

        // Create an instance of your Mailer class
        $mailer = new Mailer();  // Assuming Mailer is a class you've defined elsewhere

        // Set subject and recipient for the email
        $subject = "New Message from $name";
        $recipient = "your-email@example.com"; // Replace with your email address

        // Prepare the email body
        $email_body = "Message from: $name\n\nEmail: $email\n\nMessage:\n$message";

        // Send the email using your Mailer class
        try {
            $mailer->send_email($recipient, $subject, $email_body);
            // Send success message back to the frontend
            wp_send_json_success(['message' => '✅ Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.']);
        } catch (Exception $e) {
            // Handle error sending email
            wp_send_json_error(['message' => '❌ Une erreur s\'est produite lors de l\'envoi du message. Veuillez réessayer.']);
        }
    } else {
        // If required fields are missing, send an error
        wp_send_json_error(['message' => '❌ Veuillez remplir tous les champs.']);
    }
}


// Hook the function to WordPress to handle form submission
// add_action('template_redirect', 'handle_form_submission');


add_action('wp_ajax_handle_form_submission', 'handle_form_submission');
add_action('wp_ajax_nopriv_handle_form_submission', 'handle_form_submission');
/**
 * Function to charge autoloader for custom classes
 */
function my_autoloader($class)
{
    // Define the namespace prefix
    $prefix = 'Webluthier\\Models\\';

    // Define the base directory where class files are stored
    $base_dir = get_template_directory() . '/src/models/';

    // Check if the class uses the correct namespace prefix
    if (strpos($class, $prefix) === 0) {
        // Remove the namespace prefix
        $relative_class = substr($class, strlen($prefix));

        // Replace namespace separators with directory separators in the relative class name
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // Check if the file exists and require it
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register('my_autoloader');




function add_projet_gallery_metabox()
{
    add_meta_box(
        'projet_gallery',             // Unique ID for the meta box
        'Galerie du Projet',          // Title for the meta box
        'render_projet_gallery_metabox', // Callback function to render HTML
        'projets',                    // Post type where this meta box will appear (projets)
        'normal',                     // Context (normal, side, advanced)
        'high'                        // Priority
    );
}
add_action('add_meta_boxes', 'add_projet_gallery_metabox');

function render_projet_gallery_metabox($post)
{
    // Retrieve saved images as an array
    $gallery_images = get_post_meta($post->ID, 'projet_gallery', true);
    if (!is_array($gallery_images)) {
        $gallery_images = [];
    }
    ?>
    <div id="projet-gallery-inputs">
        <?php foreach ($gallery_images as $image): ?>
            <input type="hidden" name="projet_gallery[]" value="<?php echo esc_attr($image); ?>">
        <?php endforeach; ?>
    </div>

    <!-- <div id="projet-gallery-preview">
        <? //php// foreach ($gallery_images as $image): ?>
            <div class="gallery-item" style="display: inline-block; position: relative; margin: 5px;">
                <img src="<?php //echo esc_url($image); ?>" style="max-width: 100px; height: auto;">
                <button type="button"
                    class="remove-image absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs cursor-pointer hover:bg-red-700 transition duration-300"
                    data-url="<?php //echo esc_attr($image); ?>">❌</button>
            </div>
        <?php //endforeach; ?>
    </div> -->
    <div id="projet-gallery-preview">
        <?php foreach ($gallery_images as $image): ?>
            <div class="gallery-item" style="display: inline-block; position: relative; margin: 5px;">
                <!-- Image with inline styles preserved -->
                <img src="<?php echo esc_url($image); ?>" style="max-width: 100px; height: auto;">

                <!-- Button positioned at the top-right corner of the image -->
                <button type="button" class="remove-image" data-url="<?php echo esc_attr($image); ?>"
                    style="position: absolute; top: 0; right: 0; background-color: white; color: red; border: none; border-radius: 4px; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 14px; cursor: pointer; transition: background-color 0.3s;">
                    ❌
                </button>
            </div>
        <?php endforeach; ?>
    </div>


    <button type="button" id="upload_image_button" class="button">Select Images</button>

    <script>
        jQuery(document).ready(function ($) {
            var mediaUploader;

            // Image Upload Handler
            $('#upload_image_button').click(function (e) {
                e.preventDefault();

                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Select or Upload Images',
                    button: { text: 'Use these images' },
                    multiple: true
                });

                mediaUploader.on('select', function () {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var existingImages = [];

                    // Get already added images
                    $('#projet-gallery-inputs input[name="projet_gallery[]"]').each(function () {
                        existingImages.push($(this).val());
                    });

                    attachments.forEach(function (attachment) {
                        var imageUrl = attachment.url;

                        if (!existingImages.includes(imageUrl)) {
                            existingImages.push(imageUrl); // Add new image if not already in array
                        }
                    });

                    // console.log("Updated Image URLs:", existingImages);

                    // Update UI
                    updateGalleryPreview(existingImages);
                });

                mediaUploader.open();
            });

            // Function to Update Gallery Preview
            function updateGalleryPreview(images) {
                $('#projet-gallery-preview').html('');
                $('#projet-gallery-inputs').html('');

                images.forEach(function (imageUrl) {
                    $('#projet-gallery-preview').append(
                        '<div class="gallery-item" style="display: inline-block; position: relative; margin: 5px;">' +
                        '<img src="' + imageUrl + '" style="max-width: 100px; height: auto;">' +
                        // Button with the updated styles
                        '<button type="button" class="remove-image" data-url="' + imageUrl + '" ' +
                        'style="position: absolute; top: 0; right: 0; background-color: white; color: red; border: none; border-radius: 4px; width: 24px; height: 24px; ' +
                        'display: flex; align-items: center; justify-content: center; font-size: 14px; cursor: pointer; transition: background-color 0.3s;">' +
                        '❌' +
                        '</button>' +
                        '</div>'
                    );

                    // Add hidden input for each image
                    $('#projet-gallery-inputs').append('<input type="hidden" name="projet_gallery[]" value="' + imageUrl + '">');
                });
            }

            // Delete Image Handler
            $(document).on('click', '.remove-image', function () {
                var imageUrlToRemove = $(this).data('url');
                var updatedImages = [];

                $('#projet-gallery-inputs input[name="projet_gallery[]"]').each(function () {
                    var imgUrl = $(this).val();
                    if (imgUrl !== imageUrlToRemove) {
                        updatedImages.push(imgUrl);
                    }
                });

                // console.log("After Removal, Updated Images:", updatedImages);

                updateGalleryPreview(updatedImages);
            });
        });
    </script>
    <?php
}

function save_projet_gallery($post_id)
{
    error_log("Images, Post ID: $post_id, " . print_r($_POST, true));

    // Prevent autosave & revision issues
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (wp_is_post_revision($post_id))
        return;

    if (!empty($_POST['projet_gallery']) && is_array($_POST['projet_gallery'])) {
        // Sanitize and save the image URLs as an array
        $image_urls = array_map('esc_url_raw', $_POST['projet_gallery']);

        // Save as an array (WordPress handles it)
        update_post_meta($post_id, 'projet_gallery', $image_urls);
        error_log("✅ Image URLs Saved: " . print_r($image_urls, true));
    } else {
        delete_post_meta($post_id, 'projet_gallery');
        error_log("❌ No images selected, deleted meta.");
    }
}
add_action('save_post_projets', 'save_projet_gallery');

# priority QUICK EDIT
// 1. Add "Priorité" column to admin
add_filter('manage_projets_posts_columns', function ($columns) {
    $columns['project_priority'] = 'Priorité';
    return $columns;
});

// 2. Display the priority in the column
add_action('manage_projets_posts_custom_column', function ($column, $post_id) {
    if ($column === 'project_priority') {
        $priority = get_post_meta($post_id, '_project_priority', true);
        echo '<span class="priority-value" data-priority="' . esc_attr($priority) . '">' . esc_html($priority) . '</span>';
    }
}, 10, 2);

// 3. Add the Quick Edit input for 'project_priority'
add_action('quick_edit_custom_box', function ($column_name, $post_type) {
    if ($column_name !== 'project_priority' || $post_type !== 'projets') return;
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label>
                <span class="title">Priorité</span>
                <span class="input-text-wrap">
                    <input type="number" name="project_priority" class="project_priority" value="" />
                </span>
            </label>
        </div>
    </fieldset>
    <?php
}, 10, 2);

// 4. Save the priority when Quick Edit is saved
add_action('save_post_projets', function ($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Only update if 'project_priority' is set
    if (isset($_POST['project_priority'])) {
        $priority = intval($_POST['project_priority']);
        update_post_meta($post_id, '_project_priority', $priority);
    }
}, 10, 2);

// 5. Handle Quick Edit behavior using JavaScript (open and populate fields)
add_action('admin_footer-edit.php', function () {
    global $post_type;
    if ($post_type !== 'projets') return;
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Event delegation: Attach event listener to the parent container
            document.body.addEventListener('click', function(event) {
                // Check if the clicked element is a Quick Edit button (button with class 'editinline')
                if (event.target && event.target.matches('button.editinline')) {
                    var editButton = event.target;
                    var postId = editButton.closest('tr').id.replace('post-', '');
                    // console.log('Button clicked for Post ID:', postId);

                    // Retrieve the priority value from the <span> inside the <td> with class "column-project_priority"
                    var priority = document.querySelector('#post-' + postId + ' td.column-project_priority span.priority-value').getAttribute('data-priority');
                    // console.log('Retrieved Priority:', priority);

                    // Use setTimeout to ensure Quick Edit modal has been fully opened
                    setTimeout(function() {
                        var quickEditRow = document.getElementById('edit-' + postId);
                        if (quickEditRow) {
                            // console.log('Quick Edit row found for post ID:', postId);
                            var inputField = quickEditRow.querySelector('input[name="project_priority"]');
                            if (inputField) {
                                inputField.value = priority; // Set the priority value in the Quick Edit input field
                                // console.log('Priority set in Quick Edit input field:', priority);
                            } else {
                                console.log('Input field not found in Quick Edit row for post ID:', postId);
                            }
                        } else {
                            console.log('Quick Edit row (edit-' + postId + ') not found after timeout.');
                        }
                    }, 200); // Delay of 200 milliseconds to ensure the modal is open
                }
            });
        });
    </script>
    <?php
});

// Handle saving changes to Quick Edit form via AJAX
add_action('wp_ajax_save_project_priority', function() {
    if (isset($_POST['post_id']) && isset($_POST['priority'])) {
        $post_id = intval($_POST['post_id']);
        $priority = intval($_POST['priority']);

        // Save the priority value in post meta
        update_post_meta($post_id, '_project_priority', $priority);

        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
});


# EDIT PRIOTITY IN THE POST TYPE PROJECT
// 1. Register the "Priorité" metabox for the 'projets' post type
add_action('add_meta_boxes', function () {
    add_meta_box(
        'project_priority', // ID of the metabox
        'Priorité', // Title of the metabox
        'display_project_priority_metabox', // Callback function to display the metabox content
        'projets', // Post type
        'side', // Context (where to display: normal, side, advanced)
        'default' // Priority (default, low, high)
    );
});

// 2. Display the content inside the metabox
function display_project_priority_metabox($post) {
    // Retrieve the current priority value
    $priority = get_post_meta($post->ID, '_project_priority', true);

    // Display a number input for the priority
    ?>
    <label for="project_priority">Priorité</label>
    <input type="number" name="project_priority" id="project_priority" value="<?php echo esc_attr($priority); ?>" min="0" step="1" />
    <?php
}

// 3. Save the metabox data when the post is saved
add_action('save_post_projets', function ($post_id) {
    // Check if the post is being autosaved
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check if the current request is valid
    if (!isset($_POST['project_priority'])) return;

    // Sanitize and save the priority value
    $priority = intval($_POST['project_priority']);
    update_post_meta($post_id, '_project_priority', $priority);
});
