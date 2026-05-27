<?php

/**
 * The template for displaying pages
 *
 * @package Spotlight
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

    <div class="sm:px-8 mt-16 sm:mt-32">
        <div class="mx-auto w-full max-w-7xl lg:px-8">
            <div class="relative px-4 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                    <header class="max-w-2xl">
                        <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                            <?php the_title(); ?>
                        </h1>
                        <!-- <?php if (get_the_excerpt()) : ?>
                        <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    <?php endif; ?> -->
                    </header>

                    <div class="mt-16 sm:mt-20">
                        <div class="prose dark:prose-invert max-w-2xl">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>