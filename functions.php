<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'fl_head', 'FLChildTheme::stylesheet' );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

//add_action( 'admin_head', function() {
//	echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('wpurl') . '/DIR/TO/FAVICON/favicon.svg" />';
//} );


function load_template_part( $template_name, $part_name = null ) {
	ob_start();
	get_template_part( $template_name, $part_name );
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}

add_shortcode('kartesh', function () {
	// return file_get_contents( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-demenznav-sh-loader.php');
	$file  = get_stylesheet_directory().'/includes/karte.php';
	if (file_exists($file)) {
		return file_get_contents($file);
	}
});


add_shortcode( 'copyright', function ( $atts ) {
	return sprintf( '<span>© %s kompetenzzentrum Demenz in Schleswig-Holstein</span>', date( 'Y' ) );
} );
















