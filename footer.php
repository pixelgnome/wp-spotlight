        </main>

        <!-- Footer -->
        <footer class="mt-32 flex-none">
            <div class="sm:px-8">
                <div class="mx-auto w-full max-w-7xl lg:px-8">
                    <div class="border-t border-zinc-100 pt-10 pb-16 dark:border-zinc-700/40">
                        <div class="relative px-4 sm:px-8 lg:px-12">
                            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                                <div class="flex flex-col items-center justify-between gap-6 md:flex-row">
                                    <!-- Footer Navigation -->
                                    <div id="footer-nav" class="flex flex-wrap justify-center gap-x-6 gap-y-1 text-sm font-medium text-zinc-800 dark:text-zinc-200">
                                        <?php
                                        if (has_nav_menu('footer')) {
                                            wp_nav_menu(array(
                                                'theme_location' => 'footer',
                                                'container'      => false,
                                                'menu_class'     => 'flex flex-wrap justify-center gap-x-6 gap-y-1',
                                                'items_wrap'     => '%3$s',
                                                'link_before'    => '',
                                                'link_after'     => '',
                                                'depth'          => 1,
                                            ));
                                        } else {
                                        ?>
                                            <a href="<?php echo esc_url(home_url('/about')); ?>" class="transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('About', 'spotlight'); ?></a>
                                            <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Projects', 'spotlight'); ?></a>
                                            <a href="<?php echo esc_url(get_post_type_archive_link('speaking')); ?>" class="transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Speaking', 'spotlight'); ?></a>
                                            <a href="<?php echo esc_url(home_url('/uses')); ?>" class="transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Uses', 'spotlight'); ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <!-- Copyright -->
                                    <p class="text-sm text-zinc-400 dark:text-zinc-500">
                                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'spotlight'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        </div>
        </div>

        <?php wp_footer(); ?>
        </body>

        </html>

        <?php
        /**
         * Fallback menu function
         */
        function spotlight_fallback_menu()
        {
        ?>
            <ul class="flex rounded-full bg-white/90 px-3 text-sm font-medium text-zinc-800 shadow-lg ring-1 shadow-zinc-800/5 ring-zinc-900/5 backdrop-blur-xs dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10">
                <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('About', 'spotlight'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/articles')); ?>" class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Articles', 'spotlight'); ?></a></li>
                <li><a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Projects', 'spotlight'); ?></a></li>
                <li><a href="<?php echo esc_url(get_post_type_archive_link('speaking')); ?>" class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Speaking', 'spotlight'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/uses')); ?>" class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"><?php _e('Uses', 'spotlight'); ?></a></li>
            </ul>
        <?php
        }
