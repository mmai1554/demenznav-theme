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

add_shortcode( 'searchhome', function () {
	return load_template_part('templates/searchhome');
} );
/**
 * called “content-page.php” in that sub-folder, you would use get_template_part() like this:

1
<?php get_template_part( 'partials/content', 'page' ); ?>
 */

add_shortcode( 'mi_karte', function () {
	$file = get_stylesheet_directory() . '/includes/karte.php';
	if ( file_exists( $file ) ) {
		ob_start();
		require $file;
		$var = ob_get_contents();
		ob_end_clean();

		return $var;
	}
} );

add_shortcode( 'input_klassifikationen', function () {
	$taxonomies = get_terms( [
		'taxonomy'   => 'klassifikation',
		'hide_empty' => false,
		'parent'     => 0
	] );
	$list       = [];
	$template   = '<div class="form-check"><input class="form-check-input" type="checkbox" value="klassif[][%s]" id="K_%s"><label class="form-check-label" for="K_%s">%s</label></div>';
	foreach ( $taxonomies as $tax ) {
		$list[] = sprintf( $template,
			$tax->term_id,
			$tax->term_id,
			$tax->term_id,
			$tax->name
		);
	}

	return implode( "\n", $list );
} );


add_shortcode( 'copyright', function ( $atts ) {
	return sprintf( '<span>© %s kompetenzzentrum Demenz in Schleswig-Holstein</span>', date( 'Y' ) );
} );
















