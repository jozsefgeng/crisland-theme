<?php

require_once get_stylesheet_directory() . '/inc/class-navigation.php';

/**
 * @param string $slug
 * @param string $name Optional. Default ''.
 */
function crisland_get_template($slug, $atts = array())
{
    $template = locate_template(getThemePath() . "{$slug}.php");

    if (empty($template) && file_exists(getThemePath("{$slug}.php"))) {
        $template = getThemePath("{$slug}.php");

    }

    $template = apply_filters('crisland_get_template', $template, $slug, $atts);

    if (!empty($template)) {
        crisland_load_template($template, $atts);
    }
}

/**
 *
 */
function crisland_load_template($template, $templateArgs = array())
{
    if ($templateArgs && is_array($templateArgs)) {
        extract($templateArgs);
    }
    require $template;
}

/**
 * @param string $relativePath
 *
 * @return string
 */
function getThemePath(string $relativePath = ''): string
{
    return get_stylesheet_directory() . '/' . $relativePath;
}

function enqueue_alpine_js()
{
    wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);
}

function crisland_theme_register_menus()
{
    register_nav_menus(
        array(
            'footer-menu'   => __('Footer Menu')
        )
    );
}

function crisland_favicon()
{
    echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/assets/images/icon/favicon.ico" type="image/png">';
}


function remove_storefront_header_hooks()
{
    remove_action('storefront_header', 'storefront_site_branding', 20);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
    remove_action('storefront_header', 'storefront_primary_navigation', 50);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);
    remove_action('storefront_header', 'storefront_header_cart', 60);
}


function remove_storefront_footer_hooks()
{
    remove_action('storefront_footer', 'storefront_credit', 20);
}

add_action('init', 'crisland_theme_register_menus');
add_action('init', 'remove_storefront_header_hooks');
add_action('init', 'remove_storefront_footer_hooks');
add_action('wp_enqueue_scripts', 'enqueue_alpine_js');
add_action('wp_head', 'crisland_favicon');
