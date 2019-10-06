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
$lk         = [
	'<a href="https://demenzwegweiser-sh.de/kreis/dithmarschen/">Dithmarschen</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/herzogtum-lauenburg/">Herzogtum Lauenburg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/nordfriesland/">Nordfriesland</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/ostholstein/">Ostholstein</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/pinneberg/">Pinneberg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/ploen/">Plön</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/rendsburg-eckernfoerde/">Rendsburg-Eckernförde</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/schleswig-flensburg/">Schleswig-Flensburg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/segeberg/">Segeberg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/steinburg/">Steinburg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/stormarn/">Stormarn</a>',
	// index Flensburg = 11
	'<a href="https://demenzwegweiser-sh.de/kreis/flensburg/">Flensburg</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/kiel/">Kiel</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/luebeck/">Lübeck</a>',
	'<a href="https://demenzwegweiser-sh.de/kreis/neumuenster/">Neumünster</a>',
];
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
            <form action="<?= get_page_link( 721 ); // 721 = Umkreissuche  ?>" method="get">
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <select name="mnc-einrichtung" class="custom-select" id="Einrichtung">
                            <option value="">Hilfsangebot wählen</option>
							<?php foreach ( $taxonomies as $tax ) : ?>
                                <option value="K<?= $tax->term_id ?>"><?= $tax->name ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 pl-1">
                        <div class="input-group mb-3">
                            <label for="plz" class="px-2">Wo:</label>
                            <input name="mnc-plz" type="text" class="form-control" id="plz" placeholder="Bitte Postleitzahl eingeben" aria-label="PLZ"
                                   aria-describedby="plz">
                            <div class="input-group-append">
                                <input type="submit" value="Suche starten">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                <div class="col-md-4 py-3">
                    <img src="https://demenzwegweiser-sh.de/wp-content/uploads/2019/08/SH_blau.svg">
                </div>
                <div class="col-md-8 list-kreise">
                    <div class="row">
                        <div class="col">
                            <ul class="arrowlink">
                                <li><?= $lk[0] ?></li>
                                <li><?= $lk[1] ?></li>
                                <li><?= $lk[2] ?></li>
                                <li><?= $lk[3] ?></li>
                                <li><?= $lk[4] ?></li>
                                <li><?= $lk[5] ?></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="arrowlink">
                                <li><?= $lk[6] ?></li>
                                <li><?= $lk[7] ?></li>
                                <li><?= $lk[8] ?></li>
                                <li><?= $lk[9] ?></li>
                                <li><?= $lk[10] ?></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="arrowlink">
                                <li><?= $lk[11] ?></li>
                                <li><?= $lk[12] ?></li>
                                <li><?= $lk[13] ?></li>
                                <li><?= $lk[14] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>