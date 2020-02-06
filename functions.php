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
	if ( ! is_admin() ) {
		wp_enqueue_style( 'material', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
		wp_enqueue_style( 'font_opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap', [], null, 'all' );
		// wp_enqueue_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css', [], null, 'all' );
		// Scripts:
		wp_enqueue_script( 'mncjs', get_stylesheet_directory_uri() . '/js/mi.js' );
		// wp_enqueue_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js', ['jquery'], false, false );
	}
}


//add_action( 'admin_head', function() {
//	echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('wpurl') . '/DIR/TO/FAVICON/favicon.svg" />';
//} );

//wp_register_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap' );
//wp_register_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css' );
//wp_enqueue_script( 'select2js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js', [], null, false );

// wp_register_style( 'Leaflet', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.css' );
// wp_enqueue_style( 'leaflet' );
// wp_enqueue_script( 'leafletjs', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.js', [], null, true );

/*
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
*/

function load_template_part( $template_name, $part_name = null ) {
	ob_start();
	get_template_part( $template_name, $part_name );
	$var = ob_get_contents();
	ob_end_clean();

	return $var;
}

function cstm_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_action( 'upload_mimes', 'cstm_mime_types' );


add_shortcode( 'searchhome', function () {
	return load_template_part( 'templates/searchhome' );
} );


add_shortcode( 'copyright', function ( $atts ) {
	return sprintf( '<span>© %s kompetenzzentrum Demenz in Schleswig-Holstein</span>', date( 'Y' ) );
} );
















