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
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style','neve-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


//Créer le hook admi dans ce fichier 
//Utiliser le hook wp_nav_menu_items pour ajouter le lien dans le menu.
//La fonction is_user_logged_in pour verifier si l'utilisateur est connecter ou non

// Fonction pour modifier les éléments du menu
function ajouter_lien_admin_menu( $items, $args ) {
    // Vérifier si l'utilisateur est connecté
    if ( is_user_logged_in() ) {
        // Construire le lien "Admin"
        $lien_admin = '<li class="admin-link"><a href="' . admin_url() . '">Admin</a></li>';

        // Ajouter le lien "Admin" après le premier élément du menu
        $items = substr_replace( $items, $lien_admin, strpos( $items, '</li>', 1 ) + 5, 0 );
    }

    // Retourner les éléments du menu, modifiés ou non
    return $items;
}

// Ajouter le hook pour la modification du menu
add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_menu', 10, 2 );