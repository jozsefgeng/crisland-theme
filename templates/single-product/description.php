<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $product;
?>

<div class="max-w-screen-xl m-auto 2xl:max-w-screen-2xl text-base text-color-neutral-100 py-10 w-full">
    <h2 class="font-bold text-color-neutral-100 text-2xl py-2.5">
        <?php echo __('Product Description') ?>
    </h2>
    <p class="w-full"><?php echo wc_format_content($product->get_description()); ?></p>
</div>