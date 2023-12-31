<?php
if( ! function_exists('demchco_setup')) {
	function demchco_setup() {
		add_theme_support( 'custom-logo', [
			'height'      => 60,
			'width'       => 170,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
		] );

		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_image_size('big', 618, 463, true);
		add_image_size('small', 223, 167, true);
	}

	add_action( 'after_setup_theme', 'demchco_setup' );
}


/*
 *  scripts & styles 
 */
 
add_action( 'wp_enqueue_scripts', 'demchco_theme_scripts' );

function demchco_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/styles/css/main.css', array() );

	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('custom-burger-menu', get_template_directory_uri() . '/scripts/custom-burger-menu.js', array('jquery'), '1.0.0', true);
}

/**
 * register menus
 */
function demchco_menus() {
	$locations = array(
		'header' => __('Header Menu', 'demchco'),
	);
	register_nav_menus( $locations );
}

add_action( 'init', 'demchco_menus' );


/**
 * taxonomies
 */
add_action( 'init', 'init_taxonomy');
 function init_taxonomy () {
	register_taxonomy( 'publication-type', 'post', array(
		'label' => __('Type'),
		'rewrite' => array( 'slug' => 'type'),
		'hierarchical' => true,
	));

	register_taxonomy( 'publication-topic', 'post', array(
		'label' => __('Topic'),
		'rewrite' => array( 'slug' => 'topic'),
		'hierarchical' => true,
	));
 }
