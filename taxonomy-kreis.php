<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden.
}

use mnc\Filtersuche;

global $wp_query;
$UK = new Filtersuche();
if ( $UK->isActionFired() ) {
	$UK->validateInput();
}

?>
<?php get_header(); ?>

    <div class="mnc-mapsearch-container">
        <div class="mnc-mapsearch-container-inner">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="mnc-trefferliste">
                        <h2>Landkreis <?= single_term_title() ?></h2>
						<?php
						$UK->addLatLngToQuery( $wp_query );
						?>
						<?php get_template_part( 'templates/page-umkreissuche-liste', '' );
						$UK->removeLatLngToQuery( $wp_query );
						?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="MncMapContainer" class="mnc-trefferliste mnc-map-sticky" style="background-color: #EEE;">
                        <h3>Filter</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>