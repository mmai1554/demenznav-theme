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
            <div class="fl-content mnc-results">

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
				<?php endif; ?>

				<?php if ( $UK->isActionFired() && ! $UK->hasErrors() ): ?>
					<?php
					/** @var WP_Query $wp_query */
					global $wp_query;
					$UK->getWPQuery();
					$my_lat = $UK->getGeoData()->getLat();
					$my_lng = $UK->getGeoData()->getLong();
					?>
                    <div id="MyPosition" data-my-lat="<?= $my_lat ?>" data-my-lng="<?= $my_lng ?>">
                        <h5>Ihre Position</h5>
                    </div>
                    <div class="mnc-treffer">
                        <h5><?= $wp_query->found_posts ?> Treffer</h5>
                    </div>
					<?php
					$a = $wp_query->request;
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/einrichtung', '' );
						endwhile;
					endif;
					get_template_part( 'templates/page_navigation', '' );
					?>
				<?php endif; ?>
                <!--                Show Map-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="gmapresults"></div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>