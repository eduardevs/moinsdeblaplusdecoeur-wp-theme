<?php
/**
 * Navigation Menu Component
 *
 * @param array $args {
 *     Optional. Array of arguments.
 *     @type string $menu_type     Type of menu display. Accepts 'desktop' or 'mobile'. Default 'desktop'.
 *     @type string $menu_id       HTML ID attribute for the nav element. Default based on menu_type.
 *     @type string $menu_classes  Additional CSS classes for the nav element. Default empty.
 * }
 */

// Default arguments
$defaults = [
    'menu_type' => 'desktop',
    'menu_id' => '',
    'menu_classes' => ''
];

$args = wp_parse_args($args ?? [], $defaults);

// Set default IDs and classes based on menu type
if (empty($args['menu_id'])) {
    $args['menu_id'] = $args['menu_type'] === 'mobile' ? 'mobileMenu' : 'navMenu';
}

$base_classes = $args['menu_type'] === 'mobile'
    ? 'hidden absolute top-full left-0 w-full bg-stone-900 z-[10000] md:hidden'
    : 'navbar-nav hidden md:flex';

$nav_classes = trim($base_classes . ' ' . $args['menu_classes']);

// Desktop Walker Class - only declare once
if (!class_exists('Custom_Desktop_Nav_Walker')) {
    class Custom_Desktop_Nav_Walker extends Walker_Nav_Menu {
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $classes = implode(' ', array_filter(['nav-item', 'whitespace-nowrap']));

            // Get the original URL
            $url = $item->url;

            // Debug: Add this temporarily to see what URLs we're getting
            error_log("Desktop Menu item URL: " . $url . " | Title: " . $item->title);

            // Always convert to section links based on title, except for true external URLs
            if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
                // Check if it's an external URL (not our own domain)
                $site_url = get_site_url();
                if (strpos($url, $site_url) === false) {
                    // It's a true external URL - use as is
                    $url = esc_url($url);
                    $target = ' target="_blank" rel="noopener noreferrer"';
                } else {
                    // It's our own domain - convert to section
                    $section = strtolower(str_replace(' ', '-', $item->title));
                    if (is_singular('projets')) {
                        $url = '/accueil#' . $section;
                    } else {
                        $url = '#' . $section;
                    }
                    $target = '';
                }
            } elseif (strpos($url, '#') === 0) {
                // It's already a section link (starts with #)
                if (is_singular('projets')) {
                    // Prepend /accueil to the section link when on a project page
                    $url = '/accueil' . esc_url($url);
                } else {
                    $url = esc_url($url);
                }
                $target = '';
            } else {
                // Convert everything else to section links based on title
                $section = strtolower(str_replace(' ', '-', $item->title));
                if (is_singular('projets')) {
                    $url = '/accueil#' . $section;
                } else {
                    $url = '#' . $section;
                }
                $target = '';
            }

            $output .= sprintf(
                '<li class="%s list-none"><a href="%s"%s class="block text-xl font-bold text-[#65cfc7] hover:text-gray-500 transition-colors duration-300">%s</a></li>',
                esc_attr($classes),
                $url,
                $target,
                esc_html($item->title)
            );
        }
    }
}

// Mobile Walker Class - only declare once
if (!class_exists('Custom_Mobile_Nav_Walker')) {
    class Custom_Mobile_Nav_Walker extends Walker_Nav_Menu {
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $classes = implode(' ', array_filter(['nav-item', 'whitespace-nowrap']));

            // Get the original URL
            $url = $item->url;

            // Debug: Add this temporarily to see what URLs we're getting
            // error_log("Menu item URL: " . $url . " | Title: " . $item->title);

            // Always convert to section links based on title, except for true external URLs
            if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
                // Check if it's an external URL (not our own domain)
                $site_url = get_site_url();
                if (strpos($url, $site_url) === false) {
                    // It's a true external URL - use as is
                    $url = esc_url($url);
                    $target = ' target="_blank" rel="noopener noreferrer"';
                } else {
                    // It's our own domain - convert to section
                    $section = strtolower(str_replace(' ', '-', $item->title));
                    if (is_singular('projets')) {
                        $url = '/accueil#' . $section;
                    } else {
                        $url = '#' . $section;
                    }
                    $target = '';
                }
            } elseif (strpos($url, '#') === 0) {
                // It's already a section link (starts with #)
                if (is_singular('projets')) {
                    // Prepend /accueil to the section link when on a project page
                    $url = '/accueil' . esc_url($url);
                } else {
                    $url = esc_url($url);
                }
                $target = '';
            } else {
                // Convert everything else to section links based on title
                $section = strtolower(str_replace(' ', '-', $item->title));
                if (is_singular('projets')) {
                    $url = '/accueil#' . $section;
                } else {
                    $url = '#' . $section;
                }
                $target = '';
            }

            $output .= sprintf(
                '<li class="%s w-full border-b border-white hover:bg-[#65cfc7]"><a href="%s"%s class="block text-xl font-bold text-white text-center py-6 transition-colors duration-300">%s</a></li>',
                esc_attr($classes),
                $url,
                $target,
                esc_html($item->title)
            );
        }
    }
}

// Determine which menu to show based on current page
$menu_name = is_singular('projets') ? 'menu-project' : 'menu-principal';

// Select appropriate walker based on menu type
$walker = $args['menu_type'] === 'mobile' ? new Custom_Mobile_Nav_Walker() : new Custom_Desktop_Nav_Walker();

// Mobile menu needs wrapper ul
if ($args['menu_type'] === 'mobile') {
    echo '<nav id="' . esc_attr($args['menu_id']) . '" class="' . esc_attr($nav_classes) . '">';
    echo '<ul class="space-y-8 list-none">';
} else {
    echo '<nav id="' . esc_attr($args['menu_id']) . '" class="' . esc_attr($nav_classes) . '">';
}

// Display the menu
wp_nav_menu([
    'menu' => $menu_name,
    'container' => false,
    'items_wrap' => '%3$s',
    'menu_class' => $args['menu_type'] === 'mobile' ? 'nav-item' : 'list-none',
    'fallback_cb' => false,
    'walker' => $walker
]);

if ($args['menu_type'] === 'mobile') {
    echo '</ul>';
}
echo '</nav>';
?>
