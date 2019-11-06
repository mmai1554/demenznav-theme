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
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="mnc-listcontainer" style="background-color: #DDD;">
                    <?php  get_template_part( 'templates/page-umkreissuche-liste', '' ); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div id="MncMapContainer" class="mnc-mapcontainer mnc-map-sticky" style="background-color:#ae8947;">
                    <p>Irgendein Inhalt</p>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>