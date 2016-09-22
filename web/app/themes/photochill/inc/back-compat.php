<?php

function bouncelona_switch_theme() {
    switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
    unset( $_GET['activated'] );
    add_action( 'admin_notices', 'bouncelona_upgrade_notice' );
}
add_action( 'after_switch_theme', 'bouncelona_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Bouncelona on WordPress versions prior to 4.1.
 *
 */
function bouncelona_upgrade_notice() {
    $message = sprintf( __( 'Bouncelona requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'bouncelona' ), $GLOBALS['wp_version'] );
    printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Twenty Fifteen 1.0
 */
function bouncelona_customize() {
    wp_die( sprintf( __( 'Bouncelona requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'bouncelona' ), $GLOBALS['wp_version'] ), '', array(
        'back_link' => true,
    ) );
}
add_action( 'load-customize.php', 'bouncelona_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Twenty Fifteen 1.0
 */
function bouncelona_preview() {
    if ( isset( $_GET['preview'] ) ) {
        wp_die( sprintf( __( 'Bouncelona requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'bouncelona' ), $GLOBALS['wp_version'] ) );
    }
}
add_action( 'template_redirect', 'bouncelona_preview' );
