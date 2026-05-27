<?php

/**
 * The template for displaying single posts
 *
 * @package Spotlight
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

    <!-- Article Header -->
    <div class="sm:px-8 mt-16 lg:mt-32">
        <div class="mx-auto w-full max-w-7xl lg:px-8">
            <div class="relative px-4 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                    <div class="xl:relative">
                        <div class="mx-auto max-w-2xl">
                            <!-- Back Link -->
                            <a href="<?php echo esc_url(home_url('/portfolio')); ?>"
                                aria-label="<?php _e('Go back to portfolio', 'spotlight'); ?>"
                                class="group mb-8 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-md ring-1 shadow-zinc-800/5 ring-zinc-900/5 transition lg:absolute lg:-left-5 lg:-mt-2 lg:mb-0 xl:-top-1.5 xl:left-0 xl:mt-0 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0 dark:ring-white/10 dark:hover:border-zinc-700 dark:hover:ring-white/20">
                                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-4 w-4 stroke-zinc-500 transition group-hover:stroke-zinc-700 dark:stroke-zinc-500 dark:group-hover:stroke-zinc-400">
                                    <path d="M7.25 11.25 3.75 8m0 0 3.5-3.25M3.75 8h8.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            <!-- Article Meta -->
                            <article>
                                <header class="flex flex-col">
                                    <h1 class="mt-6 text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                                        <?php the_title(); ?>
                                    </h1>
                                    <time datetime="<?php echo get_the_date('c'); ?>" class="order-first flex items-center text-base text-zinc-400 dark:text-zinc-500">
                                        <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                                        <span class="ml-3"><?php echo get_the_date('F j, Y'); ?></span>
                                    </time>
                                </header>

                                <!-- Categories -->
                                <?php $categories = get_the_category();
                                if ($categories) : ?>
                                    <div class="mt-4 flex flex-wrap gap-1.5">
                                        <?php foreach ($categories as $cat) : ?>
                                            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                                                class="text-xs font-medium px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 ring-1 ring-teal-200 hover:bg-teal-100 dark:bg-teal-900/30 dark:text-teal-400 dark:ring-teal-800  dark:focus:bg-teal-800/50 dark:hover:bg-teal-800/50 transition">
                                                <?php echo esc_html($cat->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Article Content -->
                                <div class="mt-8 prose dark:prose-invert">
                                    <?php the_content(); ?>
                                </div>
                            </article>

                            <!-- Post Navigation -->
                            <div class="mt-16 border-t border-zinc-100 pt-10 dark:border-zinc-700/40">
                                <div class="flex justify-between">
                                    <?php
                                    $prev_post = get_previous_post();
                                    $next_post = get_next_post();
                                    ?>

                                    <?php if ($prev_post) : ?>
                                        <a href="<?php echo get_permalink($prev_post); ?>" class="group flex items-center text-sm font-medium text-zinc-800 transition hover:text-teal-500 dark:text-zinc-200 dark:hover:text-teal-400">
                                            <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="mr-2 h-4 w-4 stroke-zinc-500 transition group-hover:stroke-teal-500 dark:stroke-zinc-500 dark:group-hover:stroke-teal-400">
                                                <path d="M7.25 11.25 3.75 8m0 0 3.5-3.25M3.75 8h8.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <?php echo esc_html(get_the_title($prev_post)); ?>
                                        </a>
                                    <?php else : ?>
                                        <span></span>
                                    <?php endif; ?>

                                    <?php if ($next_post) : ?>
                                        <a href="<?php echo get_permalink($next_post); ?>" class="group flex items-center text-sm font-medium text-zinc-800 transition hover:text-teal-500 dark:text-zinc-200 dark:hover:text-teal-400">
                                            <?php echo esc_html(get_the_title($next_post)); ?>
                                            <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-2 h-4 w-4 stroke-zinc-500 transition group-hover:stroke-teal-500 dark:stroke-zinc-500 dark:group-hover:stroke-teal-400">
                                                <path d="M8.75 4.75 12.25 8m0 0-3.5 3.25M12.25 8h-8.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>