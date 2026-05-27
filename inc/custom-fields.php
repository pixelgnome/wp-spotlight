<?php
/**
 * Custom Fields for Spotlight Theme
 *
 * @package Spotlight
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add custom fields for work history
 */
function spotlight_add_work_meta_boxes() {
    add_meta_box(
        'spotlight_work_details',
        __( 'Work Details', 'spotlight' ),
        'spotlight_work_details_callback',
        'work',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'spotlight_add_work_meta_boxes' );

/**
 * Work details meta box callback
 */
function spotlight_work_details_callback( $post ) {
    wp_nonce_field( 'spotlight_save_work_details', 'spotlight_work_nonce' );

    $company = get_post_meta( $post->ID, '_spotlight_company', true );
    $role = get_post_meta( $post->ID, '_spotlight_role', true );
    $start_date = get_post_meta( $post->ID, '_spotlight_start_date', true );
    $end_date = get_post_meta( $post->ID, '_spotlight_end_date', true );
    $logo_url = get_post_meta( $post->ID, '_spotlight_logo_url', true );
    ?>
    <p>
        <label for="spotlight_company"><?php _e( 'Company:', 'spotlight' ); ?></label>
        <input type="text" id="spotlight_company" name="spotlight_company" value="<?php echo esc_attr( $company ); ?>" class="widefat" />
    </p>
    <p>
        <label for="spotlight_role"><?php _e( 'Role:', 'spotlight' ); ?></label>
        <input type="text" id="spotlight_role" name="spotlight_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" />
    </p>
    <p>
        <label for="spotlight_start_date"><?php _e( 'Start Date:', 'spotlight' ); ?></label>
        <input type="text" id="spotlight_start_date" name="spotlight_start_date" value="<?php echo esc_attr( $start_date ); ?>" />
    </p>
    <p>
        <label for="spotlight_end_date"><?php _e( 'End Date:', 'spotlight' ); ?></label>
        <input type="text" id="spotlight_end_date" name="spotlight_end_date" value="<?php echo esc_attr( $end_date ); ?>" placeholder="Present" />
    </p>
    <p>
        <label for="spotlight_logo_url"><?php _e( 'Logo URL:', 'spotlight' ); ?></label>
        <input type="text" id="spotlight_logo_url" name="spotlight_logo_url" value="<?php echo esc_attr( $logo_url ); ?>" class="widefat" />
    </p>
    <?php
}

/**
 * Save work details
 */
function spotlight_save_work_details( $post_id ) {
    if ( ! isset( $_POST['spotlight_work_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['spotlight_work_nonce'], 'spotlight_save_work_details' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'spotlight_company',
        'spotlight_role',
        'spotlight_start_date',
        'spotlight_end_date',
        'spotlight_logo_url'
    );

    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post', 'spotlight_save_work_details' );

/**
 * Add social links settings
 */
function spotlight_social_links_settings() {
    add_settings_section(
        'spotlight_social_links',
        __( 'Social Media Links', 'spotlight' ),
        null,
        'general'
    );

    $social_networks = array(
        'twitter' => 'X (Twitter)',
        'instagram' => 'Instagram',
        'github' => 'GitHub',
        'linkedin' => 'LinkedIn'
    );

    foreach ( $social_networks as $key => $label ) {
        add_settings_field(
            'spotlight_' . $key . '_url',
            $label . ' URL',
            'spotlight_social_link_callback',
            'general',
            'spotlight_social_links',
            array( 'key' => $key )
        );

        register_setting( 'general', 'spotlight_' . $key . '_url', 'esc_url' );
    }
}
add_action( 'admin_init', 'spotlight_social_links_settings' );

/**
 * Social link callback
 */
function spotlight_social_link_callback( $args ) {
    $key = $args['key'];
    $value = get_option( 'spotlight_' . $key . '_url', '' );
    echo '<input type="url" id="spotlight_' . $key . '_url" name="spotlight_' . $key . '_url" value="' . esc_attr( $value ) . '" class="regular-text" />';
}
