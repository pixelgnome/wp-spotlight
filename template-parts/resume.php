<?php
/**
 * Template part for displaying work history/resume
 *
 * @package Spotlight
 */

// Query work history posts
$work_query = new WP_Query( array(
    'post_type'      => 'work',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<div class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40">
    <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100">
        <!-- Briefcase Icon -->
        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 flex-none">
            <path d="M2.75 9.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z" class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500"/>
            <path d="M3 14.25h6.249c.484 0 .952-.002 1.316.319l.777.682a.996.996 0 0 0 1.316 0l.777-.682c.364-.32.832-.319 1.316-.319H21M8.75 6.5V4.75a2 2 0 0 1 2-2h2.5a2 2 0 0 1 2 2V6.5" class="stroke-zinc-400 dark:stroke-zinc-500"/>
        </svg>
        <span class="ml-3"><?php _e( 'Work', 'spotlight' ); ?></span>
    </h2>

    <?php if ( $work_query->have_posts() ) : ?>
        <ol class="mt-6 space-y-4">
            <?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
                <?php
                $company    = get_post_meta( get_the_ID(), '_spotlight_company', true );
                $role       = get_post_meta( get_the_ID(), '_spotlight_role', true );
                $start_date = get_post_meta( get_the_ID(), '_spotlight_start_date', true );
                $end_date   = get_post_meta( get_the_ID(), '_spotlight_end_date', true ) ?: __( 'Present', 'spotlight' );
                $logo_url   = get_post_meta( get_the_ID(), '_spotlight_logo_url', true );
                ?>
                <li class="flex gap-4">
                    <div class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md ring-1 shadow-zinc-800/5 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">
                        <?php if ( $logo_url ) : ?>
                            <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $company ); ?>" class="h-7 w-7">
                        <?php elseif ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'h-7 w-7' ) ); ?>
                        <?php endif; ?>
                    </div>
                    <dl class="flex flex-auto flex-wrap gap-x-2">
                        <dt class="sr-only"><?php _e( 'Company', 'spotlight' ); ?></dt>
                        <dd class="w-full flex-none text-sm font-medium text-zinc-900 dark:text-zinc-100">
                            <?php echo esc_html( $company ?: get_the_title() ); ?>
                        </dd>
                        <dt class="sr-only"><?php _e( 'Role', 'spotlight' ); ?></dt>
                        <dd class="text-xs text-zinc-500 dark:text-zinc-400">
                            <?php echo esc_html( $role ); ?>
                        </dd>
                        <dt class="sr-only"><?php _e( 'Date', 'spotlight' ); ?></dt>
                        <dd class="ml-auto text-xs text-zinc-400 dark:text-zinc-500" aria-label="<?php echo esc_attr( sprintf( '%s until %s', $start_date, $end_date ) ); ?>">
                            <time><?php echo esc_html( $start_date ); ?></time>
                            <span aria-hidden="true">—</span>
                            <time><?php echo esc_html( $end_date ); ?></time>
                        </dd>
                    </dl>
                </li>
            <?php endwhile; ?>
        </ol>
    <?php else : ?>
        <p class="mt-6 text-sm text-zinc-600 dark:text-zinc-400">
            <?php _e( 'No work history added yet.', 'spotlight' ); ?>
        </p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <a href="<?php echo esc_url( home_url('/filippone-cv-final.pdf' ) ); ?>" download class="group mt-6 w-full inline-flex items-center justify-center gap-2 rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-50 font-medium text-zinc-900 hover:bg-zinc-100 active:bg-zinc-100 active:text-zinc-900/60 dark:bg-zinc-800/50 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-50 dark:active:bg-zinc-800/50 dark:active:text-zinc-50/70">
        <?php _e( 'Download CV', 'spotlight' ); ?>
        <!-- Arrow Down Icon -->
        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-4 w-4 stroke-zinc-400 transition group-active:stroke-zinc-600 dark:group-hover:stroke-zinc-50 dark:group-active:stroke-zinc-50">
            <path d="M4.75 8.75 8 12.25m0 0 3.25-3.5M8 12.25v-8.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</div>
