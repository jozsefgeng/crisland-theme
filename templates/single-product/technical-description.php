<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $product;
?>
<?php if ($product->get_attributes()) : ?>
<div class="w-full bg-color-gray-100">
    <div class="max-w-screen-xl m-auto 2xl:max-w-screen-2xl text-base text-color-neutral-100 py-10">
        <h2 class="border-b-2 border-color-blue-100 font-bold text-color-neutral-100 text-2xl py-2.5">
            <?php echo __('Datasheet') ?>
        </h2>
        <div class="py-5">
            <table class="w-full">
                <?php foreach ($product->get_attributes() as $attribute) : ?>
                <?php
                                if ($attribute->is_taxonomy()) {
                                    $terms = wc_get_product_terms(
                                        $product->get_id(),
                                        $attribute->get_name(),
                                        array('fields' => 'names')
                                    );
                                    $value = implode(', ', $terms);
                                } else {
                                    $value = $attribute->get_options();
                                    if (is_array($value)) {
                                        $value = implode(', ', $value);
                                    }
                                }
                    ?>
                <tr>
                    <td class="border-b border-color-gray-200 pl-0">
                        <span
                            class="font-bold w-full md:w-1/3 text-color-neutral-100"><?php echo wc_attribute_label($attribute->get_name()); ?>
                        </span>
                    </td>
                    <td class="border-b border-color-gray-200">
                        <span
                            class="w-full md:w-2/3 text-color-neutral-100"><?php echo esc_html($value); ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>