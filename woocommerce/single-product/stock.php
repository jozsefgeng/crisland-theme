<?php

if (! defined('ABSPATH')) {
    exit;
}

?>
<?php if ($class != 'in-stock') : ?>
<p class="stock <?php echo esc_attr($class); ?>">
    <?php echo wp_kses_post($availability); ?></p>
<?php endif; ?>