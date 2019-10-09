<?php
if ( ! isset( $lk ) ) {
	$lk = [
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
}
?>

<div class="col-md-4 py-3">
    <img src="<?= site_url() . '/wp-content/uploads/2019/08/SH_blau.svg' ?>">
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