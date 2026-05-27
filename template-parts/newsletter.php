<?php

/**
 * Template part for displaying newsletter signup
 *
 * @package Spotlight
 */
?>

<?php if (isset($_GET['newsletter']) && $_GET['newsletter'] === 'success') : ?>
    <div class="rounded-2xl border border-green-200 bg-green-50 p-6 dark:border-green-900/40 dark:bg-green-900/10">
        <p class="text-sm font-semibold text-green-900 dark:text-green-400">
            <?php _e('Thank you for your message! We\'ll get back to you soon.', 'spotlight'); ?>
        </p>
    </div>
<?php else : ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40">
        <input type="hidden" name="action" value="spotlight_newsletter_signup">
        <?php wp_nonce_field('spotlight_newsletter_signup', 'spotlight_newsletter_nonce'); ?>

        <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100">
            <!-- Mail Icon -->
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="h-6 w-6 flex-none">
                <path d="M2.75 7.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z" class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500" />
                <path d="m4 6 6.024 5.479a2.915 2.915 0 0 0 3.952 0L20 6" class="stroke-zinc-400 dark:stroke-zinc-500" />
            </svg>
            <span class="ml-3"><?php _e('Get in touch', 'spotlight'); ?></span>
        </h2>

        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
            <?php _e('Send me a message and I\'ll get back to you as soon as possible.', 'spotlight'); ?>
        </p>

        <div class="mt-6 space-y-4">
            <!-- Name field -->
            <div>
                <label for="contact-name" class="sr-only"><?php _e('Name', 'spotlight'); ?></label>
                <input type="text"
                    id="contact-name"
                    name="name"
                    placeholder="<?php esc_attr_e('Name', 'spotlight'); ?>"
                    aria-label="<?php esc_attr_e('Name', 'spotlight'); ?>"
                    required
                    class="w-full appearance-none rounded-md bg-white px-3 py-2 shadow-md shadow-zinc-800/5 outline-solid outline-zinc-900/10 placeholder:text-zinc-400 focus:ring-4 focus:ring-teal-500/10 focus:outline-teal-500 sm:text-sm dark:bg-zinc-700/15 dark:text-zinc-200 dark:outline-zinc-700 dark:placeholder:text-zinc-500 dark:focus:ring-teal-400/10 dark:focus:outline-teal-400" />
            </div>

            <!-- Email field -->
            <div>
                <label for="contact-email" class="sr-only"><?php _e('Email', 'spotlight'); ?></label>
                <input type="email"
                    id="contact-email"
                    name="email"
                    placeholder="<?php esc_attr_e('Email address', 'spotlight'); ?>"
                    aria-label="<?php esc_attr_e('Email address', 'spotlight'); ?>"
                    required
                    class="w-full appearance-none rounded-md bg-white px-3 py-2 shadow-md shadow-zinc-800/5 outline-solid outline-zinc-900/10 placeholder:text-zinc-400 focus:ring-4 focus:ring-teal-500/10 focus:outline-teal-500 sm:text-sm dark:bg-zinc-700/15 dark:text-zinc-200 dark:outline-zinc-700 dark:placeholder:text-zinc-500 dark:focus:ring-teal-400/10 dark:focus:outline-teal-400" />
            </div>

            <!-- Message field -->
            <div>
                <label for="contact-message" class="sr-only"><?php _e('Message', 'spotlight'); ?></label>
                <textarea
                    id="contact-message"
                    name="message"
                    rows="5"
                    placeholder="<?php esc_attr_e('Message', 'spotlight'); ?>"
                    aria-label="<?php esc_attr_e('Message', 'spotlight'); ?>"
                    required
                    class="w-full appearance-none rounded-md bg-white px-3 py-2 shadow-md shadow-zinc-800/5 outline-solid outline-zinc-900/10 placeholder:text-zinc-400 focus:ring-4 focus:ring-teal-500/10 focus:outline-teal-500 sm:text-sm dark:bg-zinc-700/15 dark:text-zinc-200 dark:outline-zinc-700 dark:placeholder:text-zinc-500 dark:focus:ring-teal-400/10 dark:focus:outline-teal-400 resize-y"></textarea>
            </div>

            <!-- Submit button -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-4 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:active:bg-zinc-700 dark:active:text-zinc-100/70">
                    <?php _e('Send Message', 'spotlight'); ?>
                </button>
            </div>
        </div>
    </form>
<?php endif; ?>