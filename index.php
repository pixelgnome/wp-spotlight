<?php

/**
 * The main template file
 *
 * @package Spotlight
 */

get_header();
?>

<!-- Hero Section -->

<div class="sm:px-8 mt-16 sm:mt-32">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <header class="max-w-2xl">
                    <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">Portfolio Highlights</h1>
                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">I’ve created and worked on tons of projects (big and small) over the years but these are a few that I’m most proud of.</p>
                </header>
            </div>
        </div>
    </div>
</div>









<!-- Articles and Sidebar -->
<div class="sm:px-8 mt-24 md:mt-28">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <div class="mx-auto  max-w-xl gap-y-20 lg:max-w-none">


                    <!-- Articles Column -->
                    <div class="flex flex-col gap-16">
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_status'    => 'publish',
                        ));

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                                get_template_part('template-parts/content', 'portfolio');
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <p class="text-zinc-600 dark:text-zinc-400">
                                <?php _e('No articles found. Start writing to share your thoughts!', 'spotlight'); ?>
                            </p>
                        <?php endif; ?>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>