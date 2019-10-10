<?php

use mnc\Maln;

global $UK, $post; // Umkreissuche Object, only set when displaying results from Umkreissuche

$show_thumbs = FLTheme::get_setting( 'fl-archive-show-thumbs' );
$show_full   = apply_filters( 'fl_archive_show_full', FLTheme::get_setting( 'fl-archive-show-full' ) );
$more_text   = FLTheme::get_setting( 'fl-archive-readmore-text' );
$thumb_size  = FLTheme::get_setting( 'fl-archive-thumb-size', 'large' );

$klassifikationen = $categories = get_the_terms( $post, 'klassifikation' );
$kreise           = $categories = get_the_terms( $post, 'kreis' );
do_action( 'fl_before_post' ); ?>
<div class="list-einrichtungen">
    <h4><?php the_title(); ?></h4>
	<?php if ( get_field( 'untertitel' ) ): ?>
        <p class="mb-2 text-muted"><?php the_field( 'untertitel' ); ?></p>
	<?php endif; ?>
    <div class="badges">
		<?php foreach ( $kreise as $kreis ): ?>
            <a href="<?php echo( get_category_link( $kreis ) ); ?>"><span class="badge badge-secondary"><?php echo( $kreis->name ); ?></span></a>&nbsp;
            <?php if ( isset( $UK ) ): ?>
            &nbsp;<span class="badge badge-info"><?php echo( floor($UK->getDistanceOfEinrichtung( $post )) ); ?> km</span>
            <?php endif; ?>
		<?php endforeach; ?>
    </div>
	<?php the_content(); ?>
    <div class="mi-list-icons">
		<?php
		$contact = [];
		if ( $url = get_field( 'website', false, false ) ) {
			$content            = sprintf( '<a href="%s" target="_blank" title="Website %s in neuem Fenster öffnen...">%s</a>', $url, $url, $url );
			$contact['website'] = [ 'Web: ', $content, 'ua-icon-globe2' ];
		}
		if ( $email = get_field( 'email', false, false ) ) {
			$content          = sprintf( '<a href="%s" target="_blank" title="Mailprogramm öffnen und E-Mail an %s senden...">%s</a>', $email, $email, $email );
			$contact['email'] = [ 'E-Mail: ', $content, 'ua-icon-icon-6-mail-envelope-closed2' ];
		}
		if ( get_field( 'strasse' ) ) {
			$content            = get_field( 'strasse' ) . '<br>' . get_field( 'plz' ) . ' ' . get_field( 'ort' );
			$contact['adresse'] = [ '', $content, 'ua-icon-location-pin' ];
		}
		if ( get_field( 'telefon' ) ) {
			$content            = get_field( 'telefon' );
			$contact['telefon'] = [ 'Telefon: ', $content, 'ua-icon-phone3' ];
		}
		if ( count( $contact ) == 0 ) {
			return '';
		}
		$html = '<ul>';
		foreach ( $contact as $key => $line ) {
			$html .= Maln::icon_li( $line[0] . $line[1], $line[2] );
		}
		$html .= '</ul>';
		echo( $html );

		?>
    </div>
    <hr>
</div>
