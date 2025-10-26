<?php

/**
 * @param string $menu_location
 *
 * @return array
 */
function get_navigation($menu_location = 'primary')
{
    $locations = get_nav_menu_locations();
    if (!isset($locations[$menu_location])) {
        return [];
    }

    $menu_id = $locations[$menu_location];
    $menu_items = wp_get_nav_menu_items($menu_id);

    if (!$menu_items) {
        return [];
    }

    $menu_tree = [];
    $menu_index = [];

    foreach ($menu_items as $item) {
        $menu_index[$item->ID] = [
            'id'        => $item->ID,
            'title'     => $item->title,
            'url'       => $item->url,
            'parent_id' => $item->menu_item_parent,
            'banner1_image_id'      => get_post_meta($item->ID, '_menu_item_banner1', true),
            'banner1_image_url'     => wp_get_attachment_url(get_post_meta($item->ID, '_menu_item_banner1', true)),
            'banner1_text'          => get_post_meta($item->ID, '_menu_item_banner1_text', true),
            'banner1_link'          => get_post_meta($item->ID, '_menu_item_banner1_link', true),
            'banner2_image_id'      => get_post_meta($item->ID, '_menu_item_banner2', true),
            'banner2_image_url'     => wp_get_attachment_url(get_post_meta($item->ID, '_menu_item_banner2', true)),
            'banner2_text'          => get_post_meta($item->ID, '_menu_item_banner2_text', true),
            'banner2_link'          => get_post_meta($item->ID, '_menu_item_banner2_link', true),
            'banner3_image_id'      => get_post_meta($item->ID, '_menu_item_banner3', true),
            'banner3_image_url'     => wp_get_attachment_url(get_post_meta($item->ID, '_menu_item_banner3', true)),
            'banner3_text'          => get_post_meta($item->ID, '_menu_item_banner3_text', true),
            'banner3_link'          => get_post_meta($item->ID, '_menu_item_banner3_link', true),
            'children'  => []
        ];
    }

    foreach ($menu_index as $id => &$menu_item) {
        if ($menu_item['parent_id']) {
            $menu_index[$menu_item['parent_id']]['children'][] = &$menu_item;
        } else {
            $menu_tree[] = &$menu_item;
        }
    }

    return $menu_tree;
}

/**
 * @param int $category_id
 *
 * @return string
 */
function get_category_image_url(int $category_id): string
{
    $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);

    if (!$thumbnail_id) {
        return ''; // Return empty if no image found
    }

    return wp_get_attachment_url($thumbnail_id);
}
