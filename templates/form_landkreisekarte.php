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
<div class="col-md-8 mnc-list-kreise mnc-list-material">
    <div class="row">
        <div class="col-md-4">
            <ul>
                <?php foreach([0,1,2,3,4,5] as $index): ?>
                <?= \mnc\Maln::icon_li_material($lk[$index], 'arrow_forward_ios'); ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-4">
            <ul>
		        <?php foreach([6,7,8,9,10] as $index): ?>
			        <?= \mnc\Maln::icon_li_material($lk[$index], 'arrow_forward_ios'); ?>
		        <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-4">
            <ul>
		        <?php foreach([11,12,13,14] as $index): ?>
			        <?= \mnc\Maln::icon_li_material($lk[$index], 'arrow_forward_ios'); ?>
		        <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>