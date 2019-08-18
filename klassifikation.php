<?php

$show_thumbs = FLTheme::get_setting( 'fl-archive-show-thumbs' );
$show_full   = apply_filters( 'fl_archive_show_full', FLTheme::get_setting( 'fl-archive-show-full' ) );
$more_text   = FLTheme::get_setting( 'fl-archive-readmore-text' );
$thumb_size  = FLTheme::get_setting( 'fl-archive-thumb-size', 'large' );

$klassifikationen = $categories = get_the_terms( $post, 'klassifikation' );
$kreise = $categories = get_the_terms( $post, 'kreis' );
do_action( 'fl_before_post' ); ?>
<div class="m-4">
    <h4><?php the_title(); ?></h4>
	<?php if ( get_field( 'untertitel' ) ): ?>
        <h5 class="card-subtitle mb-2 text-muted"><?php the_field( 'untertitel' ); ?></h5>
	<?php endif; ?>
    <div>
		<?php if ( get_field( 'strasse' ) ): ?>
            <address>
				<?php the_field( 'strasse' ); ?><br>
				<?php the_field( 'plz' ); ?>&nbsp;<?php the_field( 'ort' ); ?>
            </address>
		<?php endif; ?>
		<?php if ( get_field( 'telefon' ) ): ?>
            Tel.: <?php the_field( 'telefon' ); ?><br>
		<?php endif; ?>
		<?php if ( get_field( 'website' ) ): ?>
            Website: <?php do_action( 'format_website', 'website' ); ?><br>
		<?php endif; ?>
		<?php the_content(); ?>
    </div>
    <a href="#" class="card-link">Kreis Dithmarschen</a>
    <a href="#" class="card-link"></a>
</div>
