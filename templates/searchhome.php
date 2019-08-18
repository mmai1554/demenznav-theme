<?php
$arrTabs    = [
	'radius' => 'Einrichtungen vor Ort',
	'kreis'  => 'Allgemeine Suche'
];
$taxonomies = get_terms( [
	'taxonomy'   => 'klassifikation',
	'hide_empty' => false,
	'parent'     => 0
] );
?>
<div class="searchhome">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="radius-tab" data-toggle="tab" href="#radius" role="tab" aria-controls="radius" aria-selected="true">Einrichtungen vor Ort</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="volltext-tab" data-toggle="tab" href="#volltext" role="tab" aria-controls="volltext" aria-selected="false">Allgemeine Suche</a>
        </li>
    </ul>
    <div class="tab-content h-100 row rounded" id="myTabContent">

        <!-- Tab 1 -->
        <div class="tab-pane col align-self-center fade show active" id="radius" role="tabpanel" aria-labelledby="radius-tab">
            <div class="row">
                <div class="col-md-6 pr-1">
                    <select class="custom-select" id="Einrichtung">
                        <option value="">Hilfsangebot wählen</option>
						<?php foreach ( $taxonomies as $tax ): ?>
                            <option value="K<?= $tax->id ?>"><?= $tax->name ?></option>
						<? endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6 pl-1">
                    <div class="input-group mb-3">
                        <label for="plz" class="px-2">Wo:</label>
                        <input type="text" class="form-control" id="plz" placeholder="Bitte Postleitzahl eingeben" aria-label="PLZ"
                               aria-describedby="plz">
                        <div class="input-group-append">
                            <button class="" type="button">Suche starten</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Tab 2 -->
        <div class="tab-pane col align-self-center fade" id="volltext" role="tabpanel" aria-labelledby="volltext-tab">

        </div>
    </div>
</div>