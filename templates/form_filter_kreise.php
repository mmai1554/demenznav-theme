<?php

use mnc\Umkreissuche;

global $UK;
if ( $UK === null ) {
	$UK = new Umkreissuche();
}
if ( ! isset( $taxonomies ) ) {
	$taxonomies = get_terms( [
		'taxonomy'   => 'klassifikation',
		'hide_empty' => false,
		'parent'     => 0
	] );
}

$seletced_plz = isset( $_GET[ Umkreissuche::QUERY_VAR_PLZ ] ) ? 'value="' . $_GET[ Umkreissuche::QUERY_VAR_PLZ ] . '"' : '';

?>
<div class="searchhome">
    <form method="get">
        <div class="row">
            <div class="col d-flex align-items-center">
                <div class="ml-md-4">
                    <select name="mnc-einrichtung" class="custom-select" id="Einrichtung">
                        <option value="">Alle Einrichtungen</option>
						<?php foreach ( $taxonomies as $tax ) :
							$mnc_einrichtung =  $_GET[ Umkreissuche::QUERY_VAR_KLASSIFIKATION ]  ?? '';
							$selected = $mnc_einrichtung == 'K' . $tax->term_id ? ' selected' : '';
							?>
                            <option value="K<?= $tax->term_id ?>" <?= $selected ?>><?= $tax->name ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <button type="submit" class="fl-button" role="button">
                    <i class="material-icons" aria-hidden="true">search</i>
                    <span class="fl-button-text">Filter</span>
                </button>
            </div>
        </div>
    </form>
</div>
