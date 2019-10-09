<?php

use mnc\Umkreissuche;
use mnc\Maln;

$UK = new Umkreissuche();
$UK->validateInput();

?>

<?php get_header(); ?>

    <div class="fl-archive <?php FLLayout::container_class(); ?>">
        <div class="row">
            <div class="fl-content">
				<?php if ( $UK->hasErrors() ): ?>
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Anfragefehler</div>
                        <div class="card-body">
                            <p class="card-text">Bei der Anfrage ist ein Fehler aufgetreten:</p>
							<?php echo( Maln::ul( $UK->getErrors() ) ); ?>
                        </div>
                    </div>
					<?php get_template_part( 'templates/searchhome' ); ?>
				<?php else: ?>
                    <h3><?= $UK->getKlassifikation()->name ?> in der Region <?= $UK->getZipcode() ?> im Umkreis von <?= $UK->getRadius() ?> km:</h3>
					<?php
					add_filter( 'posts_where', [ $UK, 'filter_radius_query' ] );
					$wp_query = new WP_Query( $args );
					remove_filter( 'posts_where', [ $UK, 'filter_radius_query' ] );
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							// $post_format = get_post_format();
							get_template_part( 'templates/klassifikation', '' );
							// get_template_part( 'content', 'page' );
						endwhile;
					endif;
					?>
				<?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>