<?php

/**
 * Template Name: Projects
 */

get_header();
?>

<div class="sm:px-8 mt-16 sm:mt-32">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <header class="max-w-2xl">
                    <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                        <?php _e('Projects', 'spotlight'); ?>
                    </h1>
                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                        <?php _e('Things I\'ve made trying to put my dent in the universe.', 'spotlight'); ?>
                    </p>
                </header>

                <div class="mt-16 sm:mt-20">
                    <?php
                    // Query for project posts
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $projects_query = new WP_Query(array(
                        'post_type' => 'project',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    ?>

                    <?php if ($projects_query->have_posts()) : ?>
                        <div class="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
                            <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
                                <article class="group relative flex flex-col items-start">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="relative z-10 flex h-12 w-12 items-center justify-center rounded-full bg-white shadow-md ring-1 shadow-zinc-800/5 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'h-8 w-8 rounded-full')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <h2 class="mt-6 text-base font-semibold text-zinc-800 dark:text-zinc-100">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl dark:bg-zinc-800/50"></span>
                                            <span class="relative z-10"><?php the_title(); ?></span>
                                        </a>
                                    </h2>

                                    <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                                        <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                                    </p>

                                    <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                                        <?php _e('View project', 'spotlight'); ?>
                                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                                            <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <?php
                        echo paginate_links(array(
                            'base'      => get_pagenum_link(1) . '%_%',
                            'format'    => 'page/%#%',
                            'current'   => max(1, $paged),
                            'total'     => $projects_query->max_num_pages,
                            'mid_size'  => 2,
                            'prev_text' => __('← Previous', 'spotlight'),
                            'next_text' => __('Next →', 'spotlight'),
                        ));
                        ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p class="text-zinc-600 dark:text-zinc-400">
                            <?php _e('No projects found.', 'spotlight'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>