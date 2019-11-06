<?php
if ( ! isset( $lk ) ) {
	$lk = [
		'<a href="/kreis/dithmarschen/">Dithmarschen</a>',
		'<a href="/kreis/herzogtum-lauenburg/">Herzogtum Lauenburg</a>',
		'<a href="/kreis/nordfriesland/">Nordfriesland</a>',
		'<a href="/kreis/ostholstein/">Ostholstein</a>',
		'<a href="/kreis/pinneberg/">Pinneberg</a>',
		'<a href="/kreis/ploen/">Plön</a>',
		'<a href="/kreis/rendsburg-eckernfoerde/">Rendsburg-Eckernförde</a>',
		'<a href="/kreis/schleswig-flensburg/">Schleswig-Flensburg</a>',
		'<a href="/kreis/segeberg/">Segeberg</a>',
		'<a href="/kreis/steinburg/">Steinburg</a>',
		'<a href="/kreis/stormarn/">Stormarn</a>',
		// index Flensburg = 11
		'<a href="/kreis/flensburg/">Flensburg</a>',
		'<a href="/kreis/kiel/">Kiel</a>',
		'<a href="/kreis/luebeck/">Lübeck</a>',
		'<a href="/kreis/neumuenster/">Neumünster</a>',
	];
}
?>

<div class="col-md-4 py-3">
	<?php echo do_shortcode('[landkreisesh]'); ?>
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