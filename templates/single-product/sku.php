<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $product;
?>

<div class="">
    <span class="text-sm"><?php echo __('Product number') .': ' .esc_html($product->get_sku()); ?></span>
</div>
