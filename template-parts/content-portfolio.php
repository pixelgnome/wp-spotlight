<?php

/**
 * Template part for displaying article cards
 *
 * @package Spotlight
 */
?>

<article class="group relative flex flex-col items-start max-w-2xl lg:max-w-5xl">
    <!-- Hover background effect -->
    <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl dark:bg-zinc-800/50"></div>

    <!-- Date -->
    <time datetime="<?php echo get_the_date('c'); ?>" class="relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5">
        <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
            <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
        </span>
        <?php echo get_the_date('F j, Y'); ?>
    </time>




    <div class="relative z-10 flex flex-col sm:flex-row gap-6">
        <!-- Thumbnail -->
        <div class="h-40 w-40 shrink-0 flex rounded-xl items-center justify-center bg-white shadow-md ring-1 shadow-zinc-800/5 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">
            <?php the_post_thumbnail('thumbnail', array('class' => 'h-35 w-35 rounded-lg')); ?>
        </div>

        <!-- Content -->
        <div class="flex flex-col justify-center">
            <!-- Title -->
            <h2 class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                <a href="<?php the_permalink(); ?>">
                    <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                    <span class="relative z-10"><?php the_title(); ?></span>
                </a>
            </h2>

            <!-- Categories -->
            <?php $categories = get_the_category(); if ( $categories ) : ?>
            <div class="relative z-10 mt-2 flex flex-wrap gap-1.5">
                <?php foreach ( $categories as $cat ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                       class="text-xs font-medium px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 ring-1 ring-teal-200 hover:bg-teal-100 dark:bg-teal-900/30 dark:text-teal-400 dark:ring-teal-800 transition">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Excerpt -->
            <p class="z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
            </p>

            <!-- Read More Link -->
            <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                <?php _e('Read article', 'spotlight'); ?>
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                    <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
</article>