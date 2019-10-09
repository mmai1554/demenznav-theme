<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden.
}
?>
<?php get_header(); ?>

    <div class="fl-archive <?php FLLayout::container_class(); ?>">
        <div class="">

            <div class="fl-content"<?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/Blog"' ); ?>>

                <h2><?= single_term_title() ?></h2>
				<?php FLTheme::archive_page_header(); ?>

				<?php if ( have_posts() ) : ?>

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'templates/einrichtung', '' );
						?>
					<?php endwhile; ?>


					<?php
					echo '<nav class="fl-archive-nav clearfix">';
					echo '<div class="fl-archive-nav-prev">' . get_previous_posts_link( __( '&laquo; Zurück', 'fl-automator' ) ) . '</div>';
					echo '<div class="fl-archive-nav-next">' . get_next_posts_link( __( 'Weiter &raquo;', 'fl-automator' ) ) . '</div>';
					echo '</nav>';
					?>

				<?php else : ?>

					<?php get_template_part( 'content', 'no-results' ); ?>

				<?php endif; ?>

            </div>

        </div>
    </div>

<?php get_footer(); ?>