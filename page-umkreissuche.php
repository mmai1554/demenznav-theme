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
							<?php get_template_part( 'templates/form_umkreissuche_unterseite' ); ?>
                        </div>
                    </div>
                <div class="mnc-treffer">
                    <h5>240 Ergebnisse</h5>
                </div>
				<?php endif; ?>

				<?php if ( $UK->isActionFired() && ! $UK->hasErrors() ): ?>

					<?php
					global $wp_query;
					$UK->getWPQuery();
					$a = $wp_query->request;
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/einrichtung', '' );
						endwhile;
					endif;
					?>
					<?php
					echo '<nav class="fl-archive-nav clearfix">';
					echo '<div class="fl-archive-nav-prev">' . get_previous_posts_link( __( '&laquo; Zurück', 'fl-automator' ) ) . '</div>';
					echo '<div class="fl-archive-nav-next">' . get_next_posts_link( __( 'Weiter &raquo;', 'fl-automator' ) ) . '</div>';
					echo '</nav>';
					?>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>