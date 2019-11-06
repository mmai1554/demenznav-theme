<?php

global $UK;
global $wp_query;

if ( $UK->isActionFired() && ! $UK->hasErrors() ): ?>
    <div class="mnc-treffer">
        <h5><?= $wp_query->found_posts ?> Treffer</h5>
    </div>
    <div class="fl-content mnc-results">
		<?php
		/** @var WP_Query $wp_query */
		$UK->getWPQuery();
		$my_lat = $UK->getGeoData()->getLat();
		$my_lng = $UK->getGeoData()->getLong();
		?>
        <div id="MyPosition" data-my-lat="<?= $my_lat ?>" data-my-lng="<?= $my_lng ?>">
            <h5>Ihre Position</h5>
        </div>
		<?php
		if ( have_posts() ) :
			$legend = [];
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
<?php endif; ?>
