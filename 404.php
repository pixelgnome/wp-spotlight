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
                    <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100"><?php esc_html_e('Page not Found', 'spotlight'); ?></h1>
                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400"><?php esc_html_e('Unfortunately this page does not exist.', 'wp-dev'); ?></p>
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
                   

                        <div class="error">
                            <?php the_widget(
                                'WP_Widget_Recent_Posts',
                                array(
                                    'title' => esc_html__('Recent Posts', 'spotlight'),
                                    'number' => 3
                                )
                            ); ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>