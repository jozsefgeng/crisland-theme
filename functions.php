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

add_filter('woocommerce_breadcrumb_defaults', function ($defaults) {
    $defaults['delimiter']   = '<span class="breadcrumb-separator"> / </span>';
    $defaults['wrap_before'] = '<div class="storefront-breadcrumb"><div class="max-w-screen-xl m-auto 2xl:max-w-screen-2xl"><nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__('breadcrumbs', 'storefront') . '">';
    $defaults['wrap_after']  = '</nav></div></div>';

    return $defaults;
});

function crisland_breadcrumb_delimiter($defaults)
{
    $defaults['delimiter']   = '<span class="breadcrumb-separator"> / </span>';
    $defaults['wrap_before'] = '<div class="storefront-breadcrumb"><div class="max-w-screen-xl m-auto 2xl:max-w-screen-2xl"><nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__('breadcrumbs', 'storefront') . '">';
    $defaults['wrap_after']  = '</nav></div></div>';
    return $defaults;
}

function remove_search_widget_from_sidebar()
{
    $sidebars_widgets = wp_get_sidebars_widgets();

    if (! empty($sidebars_widgets['sidebar-1'])) {
        foreach ($sidebars_widgets['sidebar-1'] as $key => $widget_id) {
            if (strpos($widget_id, 'block-2') !== false) {
                unset($sidebars_widgets['sidebar-1'][ $key ]);
            }
        }
        wp_set_sidebars_widgets($sidebars_widgets);
    }
}

function storefront_remove_sidebar()
{
    if (!is_product_category()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar');
    }
}

function remove_storefront_homepage_header()
{
    if (!is_home() && !is_front_page()) {
        return;
    }

    remove_action('storefront_page', 'storefront_page_header', 10);

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

function remove_storefront_singele_page_hooks()
{
    remove_action('woocommerce_after_single_product_summary', 'storefront_single_product_pagination', 30);
}

function remove_sidebar_class_from_body($classes)
{
    $classes = array_diff($classes, ['left-sidebar', 'right-sidebar']);
    return $classes;
}

function crisland_template_single_product_sku()
{
    return crisland_get_template('templates/single-product/sku');
}

/**
 * @param [type] $return
 * @param [type] $price
 * @param [type] $args
 * @param [type] $unformatted_price
 * @param [type] $original_price
 * @return void
 */
function crisland_wrap_price_decimals(
    $return,
    $price,
    $args,
    $unformatted_price,
    $original_price
) {
    $decimal_separator = wc_get_price_decimal_separator();

    list($int, $dec) = explode($decimal_separator, $price, 2);
    $priceHtml = '<span class="woocommerce-Price-amount amount"><bdi>' . $int .  $decimal_separator;
    $priceHtml .= '<span class="woocommerce-Price-amount-decimal align-super text-sm">' . $dec . '</span>';
    $priceHtml .= '<span class="woocommerce-Price-currencySymbol">' . ' ' . get_woocommerce_currency_symbol() . '</span>';
    $priceHtml .= '</bdi></span>';

    return $priceHtml;
}

add_action('init', 'crisland_theme_register_menus');
add_action('init', 'remove_storefront_header_hooks');
add_action('init', 'remove_storefront_footer_hooks');
add_action('init', 'remove_storefront_singele_page_hooks');
add_action('template_redirect', 'remove_storefront_homepage_header');
add_filter('body_class', 'remove_sidebar_class_from_body', 20);
add_action('wp_enqueue_scripts', 'enqueue_alpine_js');
add_action('wp_head', 'crisland_favicon');
add_filter('woocommerce_breadcrumb_defaults', 'crisland_breadcrumb_delimiter', 20);
add_action('widgets_init', 'remove_search_widget_from_sidebar', 20);
add_action('get_header', 'storefront_remove_sidebar');
add_action('woocommerce_single_product_summary', 'crisland_template_single_product_sku', 6);
add_filter('wc_price', 'crisland_wrap_price_decimals', 10, 5);
