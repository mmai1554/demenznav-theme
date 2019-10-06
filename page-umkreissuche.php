<?php

$errors     = [];
$has_errors = false;
$query      = false;
/** @var WP_Term $objKlass */
$objKlass = null;

if ( get_query_var( Demenznav_Sh_Public::QUERY_VAR_KLASSIFIKATION ) ) {
	$klass_id = (int) str_replace( 'K', '', sanitize_text_field( get_query_var( Demenznav_Sh_Public::QUERY_VAR_KLASSIFIKATION ) ) );
	$exists   = term_exists( $klass_id, 'klassifikation' );
	if ( ! $exists ) {
		$errors[ Demenznav_Sh_Public::QUERY_VAR_KLASSIFIKATION ] = 'Bitte wählen Sie eine Einrichtung aus.';
		$has_errors                                              = true;
	} else {
		$objKlass = get_term( $klass_id, 'klassifikation' );
	}
}
if ( get_query_var( Demenznav_Sh_Public::QUERY_VAR_PLZ ) ) {
	$plz = sanitize_text_field( get_query_var( Demenznav_Sh_Public::QUERY_VAR_PLZ ) );
	$re  = '/^[0-9]{1,5}$/m';
	if ( ! preg_match( $re, $plz ) ) {
		$errors[ Demenznav_Sh_Public::QUERY_VAR_PLZ ] = 'Bitte eine korrekte Postleitzahlsuche eingeben, erlaubt sind vollständige oder Anfangsbereiche von Postleitzahlen. ';
		$has_errors                                   = true;
	}
}


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
                    <h2><?= $objKlass->name ?> in Region <?= $plz ?>:</h2>
					<?php FLTheme::archive_page_header(); ?>
					<?php
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
					$args     = array(
						'post_type'      => 'einrichtung',
						'posts_per_page' => 10,
						'meta_query'     => [
						        $arrmeta
                        ],
						'tax_query'      => [
							[
								'taxonomy' => 'klassifikation',
								'terms'    => $klass_id,
							]
						]
					);
					$wp_query = new WP_Query( $args );
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