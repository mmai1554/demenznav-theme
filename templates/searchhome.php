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
$landkreise = get_terms( [
	'taxonomy'   => 'kreis',
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
        <li class="nav-item">
            <a class="nav-link" id="kreis-tab" data-toggle="tab" href="#kreis" role="tab" aria-controls="kreis" aria-selected="false">Landkreis</a>
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
            <div class="row">
                <div class="col-md-12">
                    <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo( 'url' ) ?>">
                        <div class="input-group mb-3">
                            <label class="screen-reader-text" for="s">Volltextsuche nach:</label>
                            <input type="text" name="s" id="s" class="form-control" placeholder="Volltextsuche" aria-label="volltext"
                                   aria-describedby="plz">
                            <div class="input-group-append fl-button-wrap fl-button-width-auto fl-button-left fl-button-has-icon">
                                <button type="submit" class="fl-button" role="button">
                                    <span class="fl-button-text">Suchen</span>
                                    <i class="fl-button-icon fl-button-icon-after ua-icon ua-icon-Search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--   Tab 3 -->
        <div class="tab-pane col align-self-center fade" id="kreis" role="tabpanel" aria-labelledby="kreis-tab">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <select class="custom-select" id="Kreis">
                        <option value="">Kreis wählen</option>
		                <?php foreach ( $landkreise as $kreis ): ?>
                            <option value="K<?= $kreis->id ?>"><?= $kreis->name ?></option>
		                <? endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 py-3">
                    <img src="https://demenzwegweiser-sh.de/wp-content/uploads/2019/08/SH_blau.svg">
                </div>
            </div>
        </div>
    </div>
</div>