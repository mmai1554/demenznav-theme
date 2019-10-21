<?php
if ( ! isset( $taxonomies ) ) {
	$taxonomies = get_terms( [
		'taxonomy'   => 'klassifikation',
		'hide_empty' => false,
		'parent'     => 0
	] );
}
?>
<form action="<?= get_page_link( 721 ); // 721 = Umkreissuche        ?>" method="get">
    <div class="row">
        <div class="col-md-7 pr-1">
            <div class="input-group">
                <select name="mnc-einrichtung" class="custom-select" id="Einrichtung" style="width:65%;">
                    <option value="">Hilfsangebot wählen</option>
					<?php foreach ( $taxonomies as $tax ) : ?>
						<?php
						$selected = $_GET[ \mnc\Umkreissuche::QUERY_VAR_KLASSIFIKATION ] == 'K' . $tax->term_id ? ' selected' : '';
						?>
                        ?>
                        <option value="K<?= $tax->term_id ?>"<?= $selected ?>><?= $tax->name ?></option>
					<?php endforeach; ?>
                </select>
                <select name="mnc-rmax" class="custom-select" id="MncRmax">
                    <option value="">Umkreis</option>
                    <option value="10">10 km</option>
                    <option value="25">25 km</option>
                    <option value="50">50 km</option>
                    <option value="100">100 km</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 pl-1">
            <div class="input-group mb-3">
                <label for="mnc-plz" class="px-2">von:</label>
				<?php
				$seletced_plz = isset( $_GET[ \mnc\Umkreissuche::QUERY_VAR_PLZ ] ) ? 'value="' . $_GET[ \mnc\Umkreissuche::QUERY_VAR_PLZ ] . '"' : '';
				?>
                <input name="mnc-plz" type="text" class="form-control" id="plz" placeholder="Bitte Postleitzahl eingeben" aria-label="PLZ"
                       aria-describedby="plz" <?= $seletced_plz ?>>
                <div class="input-group-append">
                    <input type="submit" value="Suche starten">
                </div>
            </div>
        </div>
    </div>
</form>
