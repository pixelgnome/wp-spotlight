<?php
/* Template Name: Home Page Custom Template */
get_header();
?>

<!-- Hero Section -->
<div class="sm:px-8 mt-9">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <div class="max-w-2xl">

                    <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl dark:text-zinc-100">
                        <?php
                        $hero_title = get_option('spotlight_hero_title', __('UX/UI Designer and front-end developer.', 'spotlight'));
                        echo esc_html($hero_title);
                        ?>
                    </h1>
                    <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                        <?php
                        $hero_description = get_option('spotlight_hero_description', get_bloginfo('description'));
                        echo esc_html($hero_description);
                        ?>
                    </p>

                    <!-- Social Links -->
                    <div class="mt-6 flex gap-6">
                        <?php
                        $social_links = array(
                            'twitter'   => array('label' => 'X', 'icon' => 'x'),
                            'instagram' => array('label' => 'Instagram', 'icon' => 'instagram'),
                            'github'    => array('label' => 'GitHub', 'icon' => 'github'),
                            'linkedin'  => array('label' => 'LinkedIn', 'icon' => 'linkedin'),
                        );

                        foreach ($social_links as $key => $data) {
                            $url = get_option('spotlight_' . $key . '_url');
                            if ($url) {
                                echo '<a href="' . esc_url($url) . '" aria-label="' . esc_attr(sprintf(__('Follow on %s', 'spotlight'), $data['label'])) . '" class="group -m-1 p-1">';
                                get_template_part('template-parts/icon', $data['icon']);
                                echo '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photos Section -->
<?php get_template_part('template-parts/photos'); ?>

<!-- Articles and Sidebar -->
<div class="sm:px-8 mt-24 md:mt-28">
    <div class="mx-auto w-full max-w-7xl lg:px-8">
        <div class="relative px-4 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <div class="mx-auto grid max-w-xl grid-cols-1 gap-y-20 lg:max-w-none lg:grid-cols-2">

                    <!-- Articles Column -->
                    <div class="flex flex-col gap-16">
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 10,
                            'post_status'    => 'publish',
                        ));

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                                get_template_part('template-parts/content', 'card');
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <p class="text-zinc-600 dark:text-zinc-400">
                                <?php _e('No articles found. Start writing to share your thoughts!', 'spotlight'); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar Column -->
                    <div class="space-y-10 lg:pl-16 xl:pl-24">
                        <!-- Newsletter -->
                        <?php // get_template_part('template-parts/newsletter'); ?>

                        <!-- Work History -->
                        <?php get_template_part('template-parts/resume'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>