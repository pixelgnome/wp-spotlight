<?php

/**
 * Spotlight Theme Functions
 *
 * @package Spotlight
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function spotlight_theme_setup()
{
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'spotlight'),
        'footer'  => __('Footer Menu', 'spotlight'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 64,
        'width'       => 64,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'spotlight_theme_setup');

/**
 * Enqueue scripts and styles
 */
function spotlight_enqueue_scripts()
{
    // Enqueue main stylesheet
    wp_enqueue_style('spotlight-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Tailwind CSS
    wp_enqueue_style('spotlight-tailwind', get_template_directory_uri() . '/assets/css/dist/tailwind.css', array(), '1.0.0');

    // Enqueue Tailwind CSS
    // wp_enqueue_style('spotlight-tailwind', get_template_directory_uri() . '/src/output.css', array(), '1.0.0');


    // Enqueue main JavaScript
    wp_enqueue_script('spotlight-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Enqueue dark mode toggle script
    wp_enqueue_script('spotlight-theme-toggle', get_template_directory_uri() . '/assets/js/theme-toggle.js', array(), '1.0.0', true);

    // Add inline script for theme preference
    $theme_script = "
        const theme = localStorage.getItem('theme') || 'light';
        if (theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    ";
    wp_add_inline_script('spotlight-theme-toggle', $theme_script, 'before');
}
add_action('wp_enqueue_scripts', 'spotlight_enqueue_scripts');

/**
 * Register widget areas
 */
function spotlight_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'spotlight'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'spotlight'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'spotlight_widgets_init');

/**
 * Custom excerpt length
 */
function spotlight_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'spotlight_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function spotlight_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'spotlight_excerpt_more');

/**
 * Get post thumbnail URL or default
 */
function spotlight_get_post_thumbnail()
{
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail_url(get_the_ID(), 'large');
    }
    return get_template_directory_uri() . '/assets/images/default-post.jpg';
}

/**
 * Get custom logo or avatar
 */
function spotlight_get_logo()
{
    if (has_custom_logo()) {
        return get_custom_logo();
    }
    return '<img src="' . get_template_directory_uri() . '/assets/images/avatar.jpg" alt="' . get_bloginfo('name') . '" class="rounded-full" />';
}

/**
 * Navigation menu walker for Tailwind classes
 */
class Spotlight_Nav_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_active = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes);

        $class_names = 'relative block px-3 py-2 transition';
        if ($is_active) {
            $class_names .= ' text-teal-500 dark:text-teal-400';
        } else {
            $class_names .= ' hover:text-teal-500 dark:hover:text-teal-400';
        }

        $output .= '<li>';
        $output .= '<a href="' . esc_url($item->url) . '" class="' . $class_names . '">';
        $output .= esc_html($item->title);

        if ($is_active) {
            $output .= '<span class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-teal-500/0 via-teal-500/40 to-teal-500/0 dark:from-teal-400/0 dark:via-teal-400/40 dark:to-teal-400/0"></span>';
        }

        $output .= '</a>';
    }
}

/**
 * Handle contact form submission
 */
function spotlight_handle_newsletter_signup()
{
    // Verify nonce
    if (!isset($_POST['spotlight_newsletter_nonce']) || !wp_verify_nonce($_POST['spotlight_newsletter_nonce'], 'spotlight_newsletter_signup')) {
        wp_die(__('Security check failed', 'spotlight'));
    }

    // Get and sanitize form fields
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $user_message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validate required fields
    if (empty($name)) {
        wp_die(__('Please provide your name', 'spotlight'));
    }

    if (empty($email) || !is_email($email)) {
        wp_die(__('Please provide a valid email address', 'spotlight'));
    }

    if (empty($user_message)) {
        wp_die(__('Please provide a message', 'spotlight'));
    }

    // Prepare email to admin
    $to = 'sfilippone@gmail.com';
    $subject = 'New Contact Form Submission from ' . $name;
    $message = sprintf(
        "You have received a new contact form submission:\n\n" .
        "Name: %s\n" .
        "Email: %s\n\n" .
        "Message:\n%s\n\n" .
        "---\n" .
        "Date: %s\n" .
        "IP Address: %s",
        $name,
        $email,
        $user_message,
        current_time('mysql'),
        $_SERVER['REMOTE_ADDR']
    );
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send email
    $mail_sent = wp_mail($to, $subject, $message, $headers);

    // Log the submission to WordPress database for backup
    $submission_data = array(
        'name' => $name,
        'email' => $email,
        'message' => $user_message,
        'date' => current_time('mysql'),
        'ip' => $_SERVER['REMOTE_ADDR'],
        'mail_sent' => $mail_sent ? 'yes' : 'no'
    );

    // Store in options table as backup
    $submissions = get_option('spotlight_contact_submissions', array());
    $submissions[] = $submission_data;
    update_option('spotlight_contact_submissions', $submissions);

    // Also log to error_log for debugging
    error_log('Contact Form Submission - Name: ' . $name . ', Email: ' . $email . ', Mail Sent: ' . ($mail_sent ? 'Yes' : 'No'));

    // Redirect back with success message
    $redirect_url = wp_get_referer() ? wp_get_referer() : home_url('/');
    $redirect_url = add_query_arg('newsletter', 'success', $redirect_url);
    wp_safe_redirect($redirect_url);
    exit;
}
add_action('admin_post_spotlight_newsletter_signup', 'spotlight_handle_newsletter_signup');
add_action('admin_post_nopriv_spotlight_newsletter_signup', 'spotlight_handle_newsletter_signup');

/**
 * Add admin menu page to view contact submissions
 */
function spotlight_add_contact_submissions_menu()
{
    add_menu_page(
        'Contact Submissions',
        'Contact Forms',
        'manage_options',
        'contact-submissions',
        'spotlight_contact_submissions_page',
        'dashicons-email',
        30
    );
}
add_action('admin_menu', 'spotlight_add_contact_submissions_menu');

/**
 * Display contact submissions page in admin
 */
function spotlight_contact_submissions_page()
{
    $submissions = get_option('spotlight_contact_submissions', array());
    $submissions = array_reverse($submissions); // Show newest first

    echo '<div class="wrap">';
    echo '<h1>Contact Form Submissions</h1>';

    if (empty($submissions)) {
        echo '<p>No submissions yet.</p>';
    } else {
        echo '<p>Total submissions: ' . count($submissions) . '</p>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr>';
        echo '<th>Date</th>';
        echo '<th>Name</th>';
        echo '<th>Email</th>';
        echo '<th>Message</th>';
        echo '<th>Mail Sent</th>';
        echo '<th>IP</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        foreach ($submissions as $submission) {
            echo '<tr>';
            echo '<td>' . esc_html($submission['date']) . '</td>';
            echo '<td>' . esc_html($submission['name']) . '</td>';
            echo '<td><a href="mailto:' . esc_attr($submission['email']) . '">' . esc_html($submission['email']) . '</a></td>';
            echo '<td>' . nl2br(esc_html($submission['message'])) . '</td>';
            echo '<td>' . esc_html($submission['mail_sent']) . '</td>';
            echo '<td>' . esc_html($submission['ip']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }

    echo '</div>';
}

/**
 * Include custom functions
 */
require get_template_directory() . '/inc/custom-fields.php';
require get_template_directory() . '/inc/custom-post-types.php';
