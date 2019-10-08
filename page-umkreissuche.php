<?php

use mnc\Umkreissuche;

$errors = [];
$has_errors = false;
$query      = false;
/** @var WP_Term $objKlass */
$objKlass = null;

//function radius_query( $where, $lat, $lng, $radius ) {
//	global $wpdb;
//	// Specify the co-ordinates that will form
//	// the centre of our search
////	$lat = '54.3066';
////	$lng = '9.6631';
////	$radius = 50;
//	$table = 'wp_latlong';
//
//	// Append our radius calculation to the WHERE
//	$where .= " AND $wpdb->posts.ID IN (SELECT post_id FROM $table WHERE
//         ( 6371 * acos( cos( radians(" . $lat . ") )
//                        * cos( radians( lat ) )
//                        * cos( radians( lng )
//                        - radians(" . $lng . ") )
//                        + sin( radians(" . $lat . ") )
//                        * sin( radians( lat ) ) ) ) <= " . $radius . ")";
//	// Return the updated WHERE part of the query
//	return $where;
//}

if ( get_query_var( Umkreissuche::QUERY_VAR_KLASSIFIKATION ) ) {
	$klass_id = (int) str_replace( 'K', '', sanitize_text_field( get_query_var( Umkreissuche::QUERY_VAR_KLASSIFIKATION ) ) );
	$exists   = term_exists( $klass_id, 'klassifikation' );
	if ( ! $exists ) {
		$errors[ Umkreissuche::QUERY_VAR_KLASSIFIKATION ] = 'Bitte wählen Sie eine Einrichtung aus.';
		$has_errors                                       = true;
	} else {
		$objKlass = get_term( $klass_id, 'klassifikation' );
	}
}
if ( get_query_var( Umkreissuche::QUERY_VAR_PLZ ) ) {
	$plz = sanitize_text_field( get_query_var( Umkreissuche::QUERY_VAR_PLZ ) );
	$re  = '/^[0-9]{1,5}$/m';
	if ( ! preg_match( $re, $plz ) ) {
		$errors[ Umkreissuche::QUERY_VAR_PLZ ] = 'Bitte eine korrekte Postleitzahlsuche eingeben, erlaubt sind vollständige oder Anfangsbereiche von Postleitzahlen. ';
		$has_errors                            = true;
	}
}

global $wp_query;
if ( strlen( $plz ) == 5 ) {
	$arrmeta = [
		'key'   => 'plz',
		'value' => $plz
	];
} else {
	$arrmeta = [
		'key'   => 'plz',
		'value' => $plz
	];
}
$args = array(
	'post_type'      => 'einrichtung',
	'posts_per_page' => 10,
	'tax_query'      => [
		[
			'taxonomy' => 'klassifikation',
			'terms'    => $klass_id,
		]
	]
);

// Lat / lng der PLZ suchen:
$objGeo = new \mnc\GeoData( $plz );
$objGeo->init();

?>

<?php get_header(); ?>

    <div class="fl-archive <?php FLLayout::container_class(); ?>">
        <div class="row">
            <div class="fl-content">
				<?php if ( $has_errors ): ?>
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Anfragefehler</div>
                        <div class="card-body">
                            <p class="card-text">Bei der Anfrage ist ein Fehler aufgetreten. Bitte geben Sie Ihre Anfrage erneut ein:</p>
                        </div>
                    </div>
					<?php get_template_part( 'templates/searchhome' ); ?>
				<?php else: ?>
                <?php
					$objGeo->setRadius( 50 );
                ?>
                    <h2><?= $objKlass->name ?> in der Region <?= $plz ?> im Umkreis von 10 km:</h2>
					<?php
					add_filter( 'posts_where', [ $objGeo, 'filter_radius_query' ] );
					$wp_query = new WP_Query( $args );
					remove_filter( 'posts_where', [ $objGeo, 'filter_radius_query' ] );
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							// $post_format = get_post_format();
							get_template_part( 'templates/klassifikation', '' );
							// get_template_part( 'content', 'page' );
						endwhile;
					endif;
					?>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>