<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback"
        href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php do_action('storefront_before_site'); ?>

    <div id="page" class="hfeed site">
        <?php do_action('storefront_before_header'); ?>

        <header id="masthead" class="site-header" role="banner"
            style="<?php storefront_header_styles(); ?>">
            <div class="nav-meta-bar bg-color-gray-100 border border-color-gray-100 px-3.5 md:px-5">
                <div class="container flex max-w-screen-xl m-auto 2xl:max-w-screen-2xl">
                    <div class="flex items-center pl-0 xl:pl-2 pr-2 py-2 text-sm hover:bg-neutral-200 ">
                        <span class="mr-1 color-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75">
                                </path>
                            </svg>
                        </span>
                        <span>
                            <a href="mailto:contact@crisland.ro" class="hover:no-underline"><span
                                    class="color-gray-500">contact@crisland.ro</span></a>
                        </span>
                    </div>
                    <div class="flex items-center ml-auto text-sm">
                        <div class="nav-meta-bar-item flex items-center pl-2 pr-2 py-2 text-sm hover:bg-neutral-200 ">
                            <span class="mr-1 color-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </span>
                            <span>
                                <a
                                    href="<?php echo esc_url(home_url('/blog')); ?>">
                                    <span class="mr-1 color-gray-500">
                                        <?php echo __('Blog')?>
                                    </span>
                                </a>
                            </span>
                        </div>
                        <div class="nav-meta-bar-item flex items-center pl-2 pr-2 py-2 text-sm hover:bg-neutral-200 ">
                            <span class="mr-1 color-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </span>
                            <span>
                                <a
                                    href="<?php echo esc_url(home_url('/contact')); ?>">
                                    <span class="mr-1 color-gray-500">
                                        <?php echo __('Contact')?>
                                    </span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b border-color-gray-200">
                <div class="max-w-screen-xl flex items-center m-auto py-2.5 px-3.5 md:px-5 2xl:max-w-screen-2xl">
                    <div class="flex items-center xl:hidden mr-4">
                        <button type="button" @click="open = true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="site-logo flex items-center w-14 md:w-32">
                        <a
                            href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.jpg"
                                alt="<?php bloginfo('name'); ?>"
                                class="header-image is-logo-image" />
                        </a>
                    </div>
                    <div class="flex hidden items-center md:block relative w-full">
                        <div class="m-auto w-1/2">
                            <?php the_widget('WC_Widget_Product_Search', 'title='); ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 md:grid-cols-2 gap-x-5">
                        <div class="flex items-center md:hidden relative w-full">
                            <button type="button" class="m-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 w-full">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="md:border-r md:border-color-gray-500 md:w-24">
                            <a
                                href="<?php echo wc_get_page_permalink('myaccount')?>">
                                <div class="m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6 w-full">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="hidden md:block text-center whitespace-nowrap">
                                    <?php echo __('Contul meu')?>
                                </span>
                            </a>
                        </div>
                        <div class="md:w-24">
                            <a
                                href="<?php echo wc_get_cart_url() ?>">
                                <div class="m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6 w-full">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="hidden md:block text-center whitespace-nowrap">
                                    <?php echo __('Cosul meu')?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php crisland_get_template('flyout-menu') ?>
            <?php
            /**
             * Functions hooked into storefront_header action
             *
             * @hooked storefront_header_container                 - 0
             * @hooked storefront_skip_links                       - 5
             * @hooked storefront_social_icons                     - 10
             * @hooked storefront_site_branding                    - 20
             * @hooked storefront_secondary_navigation             - 30
             * @hooked storefront_product_search                   - 40
             * @hooked storefront_header_container_close           - 41
             * @hooked storefront_primary_navigation_wrapper       - 42
             * @hooked storefront_primary_navigation               - 50
             * @hooked storefront_header_cart                      - 60
             * @hooked storefront_primary_navigation_wrapper_close - 68
             */
            do_action('storefront_header');
?>
        </header><!-- #masthead -->

        <?php
    /**
     * Functions hooked in to storefront_before_content
     *
     * @hooked storefront_header_widget_region - 10
     * @hooked woocommerce_breadcrumb - 10
     */
    do_action('storefront_before_content');
?>

        <div id="content" class="site-content" tabindex="-1">
            <div <?php echo !is_home() && ! is_front_page() &&  ! is_product() ? 'class="max-w-screen-xl m-auto 2xl:max-w-screen-2xl"' : ''; ?>>

                <?php
    do_action('storefront_content_top');
?>