<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>
<div class="py-2.5 font-bold text-2xl text-color-neutral-100">
      <?php echo $product->get_price_html(); ?></p>
</div>