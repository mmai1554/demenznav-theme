<?php

global $UK;
global $wp_query;
?>

<div class="mnc-treffer">
    <h5><?= $wp_query->found_posts ?> Treffer</h5>
</div>
<div class="fl-content mnc-results">
	<?php
	if ( $UK->hasDistance() ):
		?>
        <div id="MyPosition" data-my-lat="<?= $UK->getGeoData()->getLat() ?>" data-my-lng="<?= $UK->getGeoData()->getLong() ?>">
            <h5>Ihre Position</h5>
        </div>
	<?php endif; ?>
	<?php
	if ( have_posts() ) :
//			$legend = [];
		while ( have_posts() ) :
			the_post();
			get_template_part( 'templates/einrichtung', '' );
		endwhile;
	endif;
	?>
    <div id="PageNavigator">
		<?php get_template_part( 'templates/page_navigation', '' ); ?>
    </div>
</div>
