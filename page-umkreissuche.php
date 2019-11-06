<?php

use mnc\Umkreissuche;
use mnc\Maln;

$UK = new Umkreissuche();
if ( $UK->isActionFired() ) {
	$UK->validateInput();
}

?>

<?php get_header(); ?>
    <div class="mnc-mapsearch-container">
        <div class="mnc-mapsearch-container-inner">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="mnc-trefferliste">
					    <?php get_template_part( 'templates/page-umkreissuche-liste', '' ); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="MncMapContainer" class="mnc-mapcontainer mnc-map-sticky">
                        <div id="gmapresults"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>