<?php

/**
 * The template for displaying archives (Articles, Projects, etc.)
 *
 * @package Spotlight
 */

get_header();
?>

<div class="sm:px-8 mt-16 sm:mt-32">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <header class="max-w-2xl">
                    <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                        <?php
                        the_archive_title();
                        ?>
                    </h1>
                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                        <?php the_archive_description(); ?>
                    </p>
                </header>

                <div class="mt-16 sm:mt-20">
                    <?php if (have_posts()) : ?>
                        <div class="grid grid-cols-1 gap-y-16 lg:grid-cols-2 lg:gap-y-12 lg:gap-x-8">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="group relative flex flex-col items-start isolate">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="relative z-10 flex h-25 w-25 items-center justify-center rounded-full bg-white shadow-md ring-1 shadow-zinc-800/5 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'h-20 w-20 rounded-full')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <h2 class="mt-6 text-base font-semibold text-zinc-800 dark:text-zinc-100">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl lg:-inset-x-4 dark:bg-zinc-800/50"></span>
                                            <span class="relative z-10"><?php the_title(); ?></span>
                                        </a>
                                    </h2>

                                    <a href="<?php the_permalink(); ?>" class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                                        <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                                    </a>

                                    <?php if (! is_post_type_archive('project')) : ?>
                                        <time datetime="<?php echo get_the_date('c'); ?>" class="relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5">
                                            <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                                                <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                                            </span>
                                            <?php echo get_the_date('F j, Y'); ?>
                                        </time>
                                    <?php endif; ?>

                                    <a href="<?php the_permalink(); ?>" class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                                        <?php _e('Read more', 'spotlight'); ?>
                                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                                            <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('← Previous', 'spotlight'),
                            'next_text' => __('Next →', 'spotlight'),
                            'class'     => 'mt-12',
                        ));
                        ?>

                    <?php else : ?>
                        <p class="text-zinc-600 dark:text-zinc-400">
                            <?php _e('No posts found.', 'spotlight'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>