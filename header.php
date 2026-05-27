<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full antialiased">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex h-full bg-zinc-50 dark:bg-black'); ?>>
    <?php wp_body_open(); ?>

    <div class="flex w-full">
        <!-- Background decoration -->
        <div class="fixed inset-0 flex justify-center sm:px-8">
            <div class="flex w-full max-w-7xl lg:px-8">
                <div class="w-full bg-white ring-1 ring-zinc-100 dark:bg-zinc-900 dark:ring-zinc-300/20"></div>
            </div>
        </div>

        <div class="relative flex w-full flex-col">
            <!-- Header -->
            <header class="pointer-events-none relative z-50 flex flex-none flex-col">

                <?php if (is_page('home')) : ?>
                    <!-- Large avatar for home page -->
                    <div class="order-last mt-[calc(--spacing(16)-(--spacing(3)))]"></div>
                    <div class="sm:px-8 top-0 order-last -mb-3 pt-3">
                        <div class="mx-auto w-full max-w-7xl lg:px-8">
                            <div class="relative px-4 sm:px-8 lg:px-12 top-(--avatar-top,--spacing(3)) w-full">
                                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                    <div class="relative">
                                        <!-- small header-->
                                        <div class="absolute top-3 left-0 origin-left transition-opacity h-10 w-10 rounded-full bg-white/90 p-0.5 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs dark:bg-zinc-800/90 dark:ring-white/10"
                                            style="opacity: var(--avatar-border-opacity, 0); transform: var(--avatar-border-transform);">
                                        </div>
                                        <a href="<?php echo esc_url(home_url('/')); ?>"
                                            aria-label="<?php _e('Home', 'spotlight'); ?>"
                                            class="pointer-events-auto block h-16 w-16 origin-left">
                                            <?php
                                            $custom_logo_id = get_theme_mod('custom_logo');
                                            if ($custom_logo_id) :
                                                echo wp_get_attachment_image($custom_logo_id, 'full', false, array(
                                                    'class' => 'rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-16 w-16',
                                                    'alt' => get_bloginfo('name')
                                                ));
                                            else :
                                            ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/avatar.jpg'); ?>"
                                                    alt="<?php bloginfo('name'); ?>"
                                                    class="rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-16 w-16">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Navigation bar -->
                <div class="top-0 z-10 h-16 pt-6">
                    <div class="sm:px-8 top-(--header-top,--spacing(6)) w-full">
                        <div class="mx-auto w-full max-w-7xl lg:px-8">
                            <div class="relative px-4 sm:px-8 lg:px-12">
                                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                    <div class="relative flex gap-4">
                                        <!-- Avatar for non-home pages -->
                                        <div class="flex flex-1">
                                            <?php if (! is_page('home')) : ?>
                                                <div class="h-10 w-10 rounded-full bg-white/90 p-0.5 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs dark:bg-zinc-800/90 dark:ring-white/10">
                                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                                        aria-label="<?php _e('Home', 'spotlight'); ?>"
                                                        class="pointer-events-auto">
                                                        <?php
                                                        $custom_logo_id = get_theme_mod('custom_logo');
                                                        if ($custom_logo_id) :
                                                            echo wp_get_attachment_image($custom_logo_id, 'full', false, array(
                                                                'class' => 'rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-9 w-9',
                                                                'alt' => get_bloginfo('name')
                                                            ));
                                                        else :
                                                        ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/avatar.jpg'); ?>"
                                                                alt="<?php bloginfo('name'); ?>"
                                                                class="rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-9 w-9">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Desktop Navigation -->
                                        <div class="flex flex-1 justify-end md:justify-center">
                                            <!-- Mobile menu button -->
                                            <button id="mobile-menu-button"
                                                class="pointer-events-auto md:hidden group flex items-center rounded-full bg-white/90 px-4 py-2 text-sm font-medium text-zinc-800 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10 dark:hover:ring-white/20">
                                                Menu
                                                <svg class="ml-3 h-auto w-2 stroke-zinc-500 group-hover:stroke-zinc-700 dark:group-hover:stroke-zinc-400" viewBox="0 0 8 6" aria-hidden="true">
                                                    <path d="M1.75 1.75 4 4.25l2.25-2.5" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>

                                            <!-- Desktop Navigation -->
                                            <nav class="pointer-events-auto hidden md:block">
                                                <?php
                                                wp_nav_menu(array(
                                                    'theme_location' => 'primary',
                                                    'container'      => false,
                                                    'menu_class'     => 'flex items-center rounded-full bg-white/90 px-3 py-3 text-sm font-medium text-zinc-800 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10',
                                                    'walker'         => new Spotlight_Nav_Walker(),
                                                    'fallback_cb'    => 'spotlight_fallback_menu',
                                                ));
                                                ?>
                                            </nav>
                                        </div>

                                        <!-- Theme Toggle -->
                                        <div class="flex justify-end md:flex-1">
                                            <div class="pointer-events-auto">
                                                <button type="button"
                                                    id="theme-toggle"
                                                    aria-label="<?php _e('Toggle theme', 'spotlight'); ?>"
                                                    class="group rounded-full bg-white/90 px-3 py-2 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs transition dark:bg-zinc-800/90 dark:ring-white/10 dark:hover:ring-white/20">
                                                    <!-- Sun Icon -->
                                                    <svg class="theme-toggle-sun h-6 w-6 fill-zinc-100 stroke-zinc-500 transition group-hover:fill-zinc-200 group-hover:stroke-zinc-700 dark:hidden" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        <path d="M8 12.25A4.25 4.25 0 0 1 12.25 8v0a4.25 4.25 0 0 1 4.25 4.25v0a4.25 4.25 0 0 1-4.25 4.25v0A4.25 4.25 0 0 1 8 12.25v0Z" />
                                                        <path d="M12.25 3v1.5M21.5 12.25H20M18.791 18.791l-1.06-1.06M18.791 5.709l-1.06 1.06M12.25 20v1.5M4.5 12.25H3M6.77 6.77 5.709 5.709M6.77 17.73l-1.061 1.061" fill="none" />
                                                    </svg>
                                                    <!-- Moon Icon -->
                                                    <svg class="theme-toggle-moon hidden h-6 w-6 fill-zinc-700 stroke-zinc-500 transition dark:block" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M17.25 16.22a6.937 6.937 0 0 1-9.47-9.47 7.451 7.451 0 1 0 9.47 9.47ZM12.75 7C17 7 17 2.75 17 2.75S17 7 21.25 7C17 7 17 11.25 17 11.25S17 7 12.75 7Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- <?php if (is_front_page()) : ?>
                <div class="flex-none" style="height: var(--content-offset)"></div>
            <?php endif; ?> -->

            <!-- Mobile Navigation Menu (Hidden by default) -->
            <div id="mobile-menu" class="hidden fixed inset-0 z-50 bg-zinc-800/40 backdrop-blur-xs dark:bg-black/80">
                <div class="fixed inset-x-4 top-8 z-50 origin-top rounded-3xl bg-white p-8 ring-1 ring-zinc-900/5 dark:bg-zinc-900 dark:ring-zinc-800">
                    <div class="flex flex-row-reverse items-center justify-between">
                        <button id="mobile-menu-close" aria-label="<?php _e('Close menu', 'spotlight'); ?>" class="-m-1 p-1">
                            <svg class="h-6 w-6 text-zinc-500 dark:text-zinc-400" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m17.25 6.75-10.5 10.5M6.75 6.75l10.5 10.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <h2 class="text-sm font-medium text-zinc-600 dark:text-zinc-400"><?php _e('Navigation', 'spotlight'); ?></h2>
                    </div>
                    <nav class="mt-6">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => '-my-2 divide-y divide-zinc-100 text-base text-zinc-800 dark:divide-zinc-100/5 dark:text-zinc-300',
                            'fallback_cb'    => 'spotlight_fallback_menu',
                        ));
                        ?>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <main class="flex-auto">