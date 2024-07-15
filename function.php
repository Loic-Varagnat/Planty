<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// Fonction pour désenregistrer les styles parent
if ( !function_exists( 'chld_thm_cfg_dequeue_parent_styles' ) ):
    function chld_thm_cfg_dequeue_parent_styles() {
        // Remplacez 'parent-style-handle' par les handles des styles parent si nécessaire
        wp_dequeue_style('hello-elementor');
        wp_deregister_style('hello-elementor');
        wp_dequeue_style('hello-elementor-theme-style');
        wp_deregister_style('hello-elementor-theme-style');
        wp_dequeue_style('hello-elementor-header-footer');
        wp_deregister_style('hello-elementor-header-footer');
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_dequeue_parent_styles', 20 );

// Fonction pour enregistrer les styles du thème enfant
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        // Enregistrer et charger le style enfant après avoir désenregistré les styles parent
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 998 );

// END ENQUEUE PARENT ACTION

// Hook admin menu
/**
 * Affiche le bouton Admin pour les administrateurs.
 */
function afficher_bouton_admin() {
    if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
        echo '<a class="btn-nr" href="' . esc_url( admin_url() ) . '">Admin</a>';
    }
}
add_action( 'afficher_bouton_admin', 'afficher_bouton_admin' );
