<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden.
}
?>
<?php get_header(); ?>

    <div class="fl-archive <?php FLLayout::container_class(); ?>">
        <div class="">

            <div class="fl-content"<?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/Blog"' ); ?>>

                <h2>Kreis <?= single_term_title() ?></h2>
                <p>Alle Einrichtungen des Kreises nach Alphabet sortiert</p>
				<?php FLTheme::archive_page_header(); ?>

				<?php if ( have_posts() ) : ?>


					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<?php
						// $post_format = get_post_format();
						get_template_part( 'templates/einrichtung', '' );
						?>
					<?php endwhile; ?>


					<?php
					get_template_part( 'templates/page_navigation', '' );
					?>

				<?php else : ?>

					<?php get_template_part( 'content', 'no-results' ); ?>

				<?php endif; ?>

            </div>

        </div>
    </div>

<?php get_footer(); ?>