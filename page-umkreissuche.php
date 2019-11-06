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
						<?php
						if ( $UK->isActionFired() && ! $UK->hasErrors() ) {
							$UK->getWPQuery();
							get_template_part( 'templates/page-umkreissuche-liste', '' );
						}
						if($UK->isActionFired() && $UK->hasErrors()):
						$errors = $UK->getErrors();
						?>
                        <div class="p-4 bg-danger text-white">
                            <p>Ihre Anfrage konnte nicht verarbeitet werden. Folgende Fehler sind aufgetreten:</p>
                            <?= Maln::ul($errors); ?>
                        </div>
                        <?php endif; ?>
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