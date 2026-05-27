<?php

/**
 * Template part for displaying photo gallery
 *
 * @package Spotlight
 */

// Get photos from a custom option or use default images
$photos = get_option('spotlight_photos', array());
$rotations = array('rotate-2', '-rotate-2', 'rotate-2', 'rotate-2', '-rotate-2');

// If no photos are set, use default placeholders
if (empty($photos)) {
    $photos = array(
        get_template_directory_uri() . '/assets/images/photos/image-1.webp',
        get_template_directory_uri() . '/assets/images/photos/image-2.webp',
        get_template_directory_uri() . '/assets/images/photos/image-3.webp',
        get_template_directory_uri() . '/assets/images/photos/image-4.webp',
        get_template_directory_uri() . '/assets/images/photos/image-5.webp',
    );
}
?>

<div class="mt-16 sm:mt-20">
    <div class="-my-4 flex justify-center gap-5 overflow-hidden py-4 sm:gap-8">
        <?php foreach ($photos as $index => $photo) : ?>
            <div class="relative aspect-9/10 w-44 flex-none overflow-hidden rounded-xl bg-zinc-100 sm:w-72 sm:rounded-2xl dark:bg-zinc-800">
                <img src="<?php echo esc_url($photo); ?>"
                    alt=""
                    sizes="(min-width: 640px) 18rem, 11rem"
                    class="absolute inset-0 h-full w-full object-cover" />
            </div>
        <?php endforeach; ?>
    </div>
</div>