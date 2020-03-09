<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden.
}

use mnc\Filtersuche;

global $wp_query;
$kreis                  = get_queried_object();
$alle_kreise            = get_terms( \mnc\Einrichtung::TAXONOMY_KREIS );
$UK                     = new Filtersuche();
$current_klassifikation = get_query_var( \mnc\Umkreissuche::QUERY_VAR_KLASSIFIKATION );
if ( $kreis->taxonomy == \mnc\Einrichtung::TAXONOMY_KREIS ) {
	$UK->setCurrentKreis( $kreis );
}
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
                    <div class="dropdown">
                            <h2 class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Landkreis <?= single_term_title() ?>
                        </h2>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <form action="/umkreissuche/" method="get" class="py-2 mnc-defbutton">
                                <div class="input-group p-2">
                                    <input type="text" name="mnc-plz" class="form-control" placeholder="Postleitzahl" aria-label="Postleitzahl" aria-describedby="PLZSuche">
                                    <div class="input-group-append">
                                        <button type="submit" class="fl-button" id="PLZSuche">OK</button>
                                    </div>
                                </div>
                                <input type="hidden" name="mnc-einrichtung" value="<?= $current_klassifikation ?>">
                            </form>
                            <div class="dropdown-divider"></div>
                            <?php foreach ( $alle_kreise as $akreis ): /** @var WP_Term $akreis */ ?>
	                            <?php
	                            $mod_url = get_category_link( $akreis );
	                            if ( $current_klassifikation ) {
		                            $mod_url = add_query_arg( [ \mnc\Umkreissuche::QUERY_VAR_KLASSIFIKATION => $current_klassifikation ], $mod_url );
	                            }
	                            ?>
	                            <?php if ( $akreis->term_id != $kreis->term_id ): ?>
                                    <a class="dropdown-item" href="<?= $mod_url ?>"><?= $akreis->name ?></a>
	                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

					<?php
					$UK->getWPQuery();
					get_template_part( 'templates/page-umkreissuche-liste', '' );
					?>
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
