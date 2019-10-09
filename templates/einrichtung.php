<?php

$show_thumbs = FLTheme::get_setting( 'fl-archive-show-thumbs' );
$show_full   = apply_filters( 'fl_archive_show_full', FLTheme::get_setting( 'fl-archive-show-full' ) );
$more_text   = FLTheme::get_setting( 'fl-archive-readmore-text' );
$thumb_size  = FLTheme::get_setting( 'fl-archive-thumb-size', 'large' );

$klassifikationen = $categories = get_the_terms( $post, 'klassifikation' );
$kreise           = $categories = get_the_terms( $post, 'kreis' );
do_action( 'fl_before_post' ); ?>
<div class="tax-klassifikation">
    <h4><?php the_title(); ?></h4>
	<?php if ( get_field( 'untertitel' ) ): ?>
        <p class="mb-2 text-muted"><?php the_field( 'untertitel' ); ?></p>
	<?php endif; ?>
    <div class="badges">
        <?php foreach($kreise as $kreis): ?>
            <a href="<?php echo(get_category_link( $kreis )); ?>"><span class="badge badge-secondary"><?php echo( $kreis->name); ?></span></a>&nbsp;
        <?php endforeach; ?>
    </div>
	<?php the_content(); ?>
    <div class="mi-list-icons">
        <?php do_action( 'format_contact' ); ?>
    </div>
    <hr>
</div>
