<?php

use mnc\Maln;
global $UK;

?>
<div class="fl-content mnc-results">
	<?php if ( $UK->isActionFired() && ! $UK->hasErrors() ): ?>
		<?php
		/** @var WP_Query $wp_query */
		global $wp_query;
		$UK->getWPQuery();
		$my_lat = $UK->getGeoData()->getLat();
		$my_lng = $UK->getGeoData()->getLong();
		?>
        <div id="MyPosition" data-my-lat="<?= $my_lat ?>" data-my-lng="<?= $my_lng ?>">
            <h5>Ihre Position</h5>
        </div>
		<?php
		$a = $wp_query->request;
		if ( have_posts() ) :
			$legend = [];
			while ( have_posts() ) :
				the_post();
				get_template_part( 'templates/einrichtung', '' );
			endwhile;
		endif;
		get_template_part( 'templates/page_navigation', '' );
		?>
	<?php endif; ?>
    <!--                Show Map-->
</div>