<?php

use mnc\Maln;

global $UK, $post; // Umkreissuche Object, only set when displaying results from Umkreissuche

$show_thumbs = FLTheme::get_setting( 'fl-archive-show-thumbs' );
$show_full   = apply_filters( 'fl_archive_show_full', FLTheme::get_setting( 'fl-archive-show-full' ) );
$more_text   = FLTheme::get_setting( 'fl-archive-readmore-text' );
$thumb_size  = FLTheme::get_setting( 'fl-archive-thumb-size', 'large' );

$klassifikationen = $categories = get_the_terms( $post, 'klassifikation' );
$kreise           = $categories = get_the_terms( $post, 'kreis' );
$url              = get_field( 'website', false, false );
$email            = get_field( 'email', false, false );
$adresse          = get_field( 'strasse' ) ? get_field( 'strasse' ) . '<br>' . get_field( 'plz' ) . ' ' . get_field( 'ort' ) : '';

$geoloc = get_field( 'standort' );
if ( isset( $geoloc['lat'] ) ) {
	$lat              = $geoloc['lat'];
	$lng              = $geoloc['lng'];
	$data             = sprintf( 'data-lat="%s" data-lng="%s"', $lat, $lng );
	$url_routenplaner = 'https://www.google.com/maps?saddr=My+Location&daddr=' . $lat . ',' . $lng;

} else {
	$lat              = false;
	$lng              = false;
	$data             = '';
	$url_routenplaner = false;
}
$entfernung = isset( $UK ) && false !== $lat ? floor( $UK->getDistanceOfEinrichtung( $post ) ) . '&nbsp;km' : '';


do_action( 'fl_before_post' ); ?>
<div class="mnc-einrichtung" <?= $data ?>>
    <h3><?php the_title(); ?></h3>
	<?php if ( get_field( 'untertitel' ) ): ?>
        <p class="mb-2 text-muted"><?php the_field( 'untertitel' ); ?></p>
	<?php endif; ?>
    <div class="badges">
		<?php foreach ( $kreise as $kreis ): ?>
            <a href="<?php echo( get_category_link( $kreis ) ); ?>"><span class="badge badge-secondary"><?php echo( $kreis->name ); ?></span></a>
			<?php if ( $entfernung ): ?>
                <span class="badge badge-info"><?= $entfernung ?></span>
			<?php endif; ?>
		<?php endforeach; ?>
    </div>
	<?php the_content(); ?>
    <div class="mi-list-icons">
		<?php
		$html = [];
		if ( $url ) {
			// $content            = sprintf( '<a href="%s" target="_blank" title="Website %s in neuem Fenster öffnen...">%s</a>', $url, $url, $url );
			$content = Maln::alink( $url, $url, '_blank', 'Website in neuem Fenster öffnen' );
			$html[]  = Maln::icon_li_material( 'Web: ' . $content, 'language' );
		}
		if ( $email = get_field( 'email', false, false ) ) {
			$content = sprintf( '<a href="%s" target="_blank" title="Mailprogramm öffnen und E-Mail an %s senden...">%s</a>', $email, $email, $email );
			$html[]  = Maln::icon_li_material( 'E-Mail: ' . $content, 'email' );
		}
		if ( get_field( 'strasse' ) ) {
			$content = get_field( 'strasse' ) . '<br>' . get_field( 'plz' ) . ' ' . get_field( 'ort' );
			$html[] = Maln::icon_li_material( $content, 'room' );
		}
		if ( get_field( 'telefon' ) ) {
			$content = get_field( 'telefon' );
			$html[]  = Maln::icon_li_material( 'Tel.: ' . $content, 'phone_enabled' );
		}
		if ( $url_routenplaner ) {
			$content = Maln::alink(
				$url_routenplaner,
				'Routenplaner (Google Maps)',
				'_blank',
				'Routenplaner in neuem Fenster öffnen'
			);
			$html[]  = Maln::icon_li_material( $content, 'map' );
		}
		echo( Maln::ul( $html ) );

		?>
    </div>
    <hr>
</div>
