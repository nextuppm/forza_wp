<?php
    remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	add_action( 'after_setup_theme', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus( array(
			'topmenu'              => __( 'Top menu',  'forzatheme' ),
			//'osnovnoemenu'         => __( 'Основное меню', 'forzatheme' ),
		) );
	}

add_action( 'wp_enqueue_scripts', 'my_scripts_method', 99 );
function my_scripts_method() {
	// получаем версию jQuery
	wp_enqueue_script( 'jquery' );
	// для версий WP меньше 3.6 'jquery' нужно поменять на 'jquery-core'
	$wp_jquery_ver = $GLOBALS['wp_scripts']->registered['jquery']->ver;
	$jquery_ver = $wp_jquery_ver == '' ? '3.2.1' : $wp_jquery_ver;

	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' , array(), null, true);
	wp_enqueue_script( 'jquery' );
}
