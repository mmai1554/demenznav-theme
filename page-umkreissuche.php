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
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Anfragefehler</div>
                        <div class="card-body">
                            <p class="card-text">Bei der Anfrage ist ein Fehler aufgetreten:</p>
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

				<?php if ( $UK->isActionFired() ): ?>
                    <h3><?= $UK->getKlassifikation()->name ?> in der Region <?= $UK->getZipcode() ?> im Umkreis von <?= $UK->getRadius() ?> km:</h3>
					<?php
					global $wp_query;
					add_filter( 'posts_where', [ $UK, 'filter_radius_query' ] );
					$wp_query = $UK->getWPQuery();
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/klassifikation', '' );
						endwhile;
					endif;
					?>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>