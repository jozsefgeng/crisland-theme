<?php $navigation = get_navigation();?>
<?php if ($navigation) :?>
<div class="nav-flyoutmenu hidden xl:block shadow-lg">
    <div class="container max-w-screen-xl m-auto 2xl:max-w-screen-2xl">
        <div class="flex items-center">
            <div class="hidden lg:block lg:self-stretch">
                <div class="flex h-full">
                    <?php foreach ($navigation as $item) :?>
                    <div x-data="{ 
                                open: false,
                                activeChild: <?php echo !empty($item['children']) && !empty($item['children'][0]['children']) ? '0' : 'null'; ?>,
                                setActiveChild(index) {
                                    this.activeChild = index;
                                }
                            }" class="flyoutmenu-item pr-4" @mouseleave="open = false">
                        <button type="button" @mouseover="open = true" @mouseenter="open = true"
                            x-bind:class="open ? 'open' : ''"
                            class="border-0 font-bold flex h-16 items-center relative text-sm z-10 hover:bg-transparent">
                            <a
                                href="<?php echo $item['url']?>">
                                <span
                                    class="text-base text-color-neutral-100"><?php echo $item['title']?></span>
                            </a>
                        </button>
                        <?php if ($item['children']) :?>
                        <div x-show="open"
                            class="flyoutmenu-subitem absolute border-t border-color-gray-200 bg-white inset-x-0 shadow-lg top-full text-sm z-10 w-full left-0"
                            style="display: none;">
                            <div class="relative">
                                <div class="mx-auto max-w-screen-xl 2xl:max-w-screen-2xl">
                                    <div class="container py-10">
                                        <div class="flex">
                                            <div class="border-r border-color-gray-200 pr-14">
                                                <?php foreach ($item['children'] as $childIndex => $children) :?>
                                                <div class="mb-1.5">
                                                    <button type="button"
                                                        class="flex color-neutral-100 items-center text-left hover:color-neutral-100 hover:bg-transparent hover:underline"
                                                        @mouseover="setActiveChild(<?php echo $childIndex; ?>)">
                                                        <a href="<?php echo $children['url']; ?>"
                                                            class="hover:bg-none hover:color-neutral-100">
                                                            <span
                                                                class="text-base whitespace-nowrap"><?php echo $children['title']; ?></span>
                                                        </a>
                                                        <?php if ($children['children']) : ?>
                                                        <span
                                                            class="icon-chevron-right flex items-center color-neutral-100 ml-2.5"
                                                            x-show="activeChild === <?php echo $childIndex; ?>"
                                                            x-transition>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="2.5"
                                                                stroke="currentColor" class="h-4 w-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                            </svg>
                                                        </span>
                                                        <?php endif; ?>
                                                    </button>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php if ($item['children'][0]['children']) : ?>
                                            <div class="border-r border-color-gray-200 pr-14 pl-14">
                                                <!-- Show sub-children based on active child -->
                                                <?php foreach ($item['children'] as $childIndex => $children) :?>
                                                <?php if ($children['children']) :?>
                                                <div x-show="activeChild === <?php echo $childIndex; ?>"
                                                    x-transition:enter="transition ease-out duration-200"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100">
                                                    <?php foreach ($children['children'] as $child_children) :?>
                                                    <div class="mb-1.5">
                                                        <button type="button"
                                                            class="color-neutral-100 hover:color-neutral-100 hover:bg-transparent hover:underline">
                                                            <a
                                                                href="<?php echo $child_children['url']?>">
                                                                <span
                                                                    class="text-base text-gray-700 hover:text-gray-900"><?php echo $child_children['title']?></span>
                                                            </a>
                                                        </button>
                                                    </div>
                                                    <?php endforeach;?>
                                                </div>
                                                <?php endif;?>
                                                <?php endforeach ?>
                                            </div>
                                            <?php endif; ?>
                                            <div class="grid ml-auto grid-cols-3">
                                                <?php if ($item['banner1_image_url']) : ?>
                                                <div class="p-5">
                                                    <?php if ($item['banner1_link']) : ?><a
                                                        href="<?php echo esc_url($item['banner1_link'])?>"><?php endif ?>
                                                        <img
                                                            src="<?php echo esc_url($item['banner1_image_url']); ?>" />
                                                        <?php if ($item['banner1_text']) : ?>
                                                        <span
                                                            class="block p-2.5 text-center text-xl font-semibold"><?php echo sanitize_text_field($item['banner1_text']); ?></span>
                                                        <?php endif ;?>
                                                        <?php if ($item['banner1_link']) : ?></a><?php endif ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($item['banner2_image_url']) : ?>
                                                <div class="p-5">
                                                    <?php if ($item['banner2_link']) : ?><a
                                                        href="<?php echo esc_url($item['banner2_link'])?>"><?php endif ?>
                                                        <img
                                                            src="<?php echo esc_url($item['banner2_image_url']); ?>" />
                                                        <?php if ($item['banner2_text']) : ?>
                                                        <span
                                                            class="block p-2.5 text-center text-xl font-semibold"><?php echo sanitize_text_field($item['banner2_text']); ?></span>
                                                        <?php endif ;?>
                                                        <?php if ($item['banner2_link']) : ?></a><?php endif ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($item['banner3_image_url']) : ?>
                                                <div class="p-5">
                                                    <?php if ($item['banner3_link']) : ?><a
                                                        href="<?php echo esc_url($item['banner3_link'])?>"><?php endif ?>
                                                        <img
                                                            src="<?php echo esc_url($item['banner3_image_url']); ?>" />
                                                        <?php if ($item['banner3_text']) : ?>
                                                        <span
                                                            class="block p-2.5 text-center text-xl font-semibold"><?php echo sanitize_text_field($item['banner3_text']); ?></span>
                                                        <?php endif ;?>
                                                        <?php if ($item['banner3_link']) : ?></a><?php endif ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>