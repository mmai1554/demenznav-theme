<?php
if ( ! isset( $taxonomies ) ) {
	$taxonomies = get_terms( [
		'taxonomy'   => 'klassifikation',
		'hide_empty' => false,
		'parent'     => 0
	] );
}
?>
<div class="searchhome">
    <form action="/umkreissuche/" method="get">
        <div class="row">
            <div class="col-md-6 pr-1">
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
                </div>
            </div>
            <div class="col-md-6 pl-1">
                <div class="input-group mb-3 d-flex align-items-center">
                    <label for="mnc-plz" class="px-2">in der Nähe von:</label>
					<?php
					$seletced_plz = isset( $_GET[ \mnc\Umkreissuche::QUERY_VAR_PLZ ] ) ? 'value="' . $_GET[ \mnc\Umkreissuche::QUERY_VAR_PLZ ] . '"' : '';
					?>
                    <input name="mnc-plz" type="text" class="form-control" id="plz" placeholder="Bitte Postleitzahl eingeben" aria-label="PLZ"
                           aria-describedby="plz" <?= $seletced_plz ?>>
                    <div class="input-group-append">
                        <input type="submit" value="nochmal suchen">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
