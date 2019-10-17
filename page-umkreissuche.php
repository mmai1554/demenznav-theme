<?php

use mnc\Umkreissuche;
use mnc\Maln;

$UK = new Umkreissuche();
if ( $UK->isActionFired() ) {
	$UK->validateInput();
}

?>

<?php get_header(); ?>

    <div class="fl-archive <?php FLLayout::container_class(); ?>">
        <div class="row">
            <div class="fl-content">

				<?php if ( $UK->hasErrors() ): ?>
                    <div class="card mb-3">
                        <div class="card-header text-white bg-info">Anfragefehler</div>
                        <div class="card-body">
                            <p class="card-text">Die Suche konnte nicht ausgeführt werden:</p>
							<?php echo( Maln::ul( $UK->getErrors() ) ); ?>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if ( $UK->showSearchform() ): ?>
                    <div class="row mnc-wrapper-form-umkreissuche">
                        <div class="col-12 mx-auto p-3 bg-light">
                            <p>Bitte wählen Sie eine Einrichtung in Ihrem Postleitzahlenbereich aus:</p>
							<?php get_template_part( 'templates/form_umkreissuche' ); ?>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if ( $UK->isActionFired() && !$UK->hasErrors() ): ?>
                    <h3><?= $UK->getKlassifikation()->name ?> in der Region <?= $UK->getZipcode() ?> im Umkreis von <?= $UK->getRadius() ?> km:</h3>
					<?php
                global $wp_query;
					// global $wp_query;
//					add_filter( 'posts_join', [ $UK, 'add_join_geocode' ] );
//					add_filter( 'posts_fields', [ $UK, 'add_fields_geocode' ], 10, 2 );
//					add_filter( 'posts_where', [ $UK, 'filter_radius_query' ] );
					$UK->getWPQuery();
					$a = $wp_query->request;
//					remove_filter( 'posts_join', [ $UK, 'add_join_geocode' ] );
//					remove_filter( 'posts_fields', [ $UK, 'add_fields_geocode' ] );
//					remove_filter( 'posts_where', [ $UK, 'filter_radius_query' ] );
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/einrichtung', '' );
						endwhile;
					endif;
					?>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>