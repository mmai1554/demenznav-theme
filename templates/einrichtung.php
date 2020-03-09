<?php

use mnc\Maln;

global $UK, $post, $legend; // Umkreissuche / Filtersuche Object, only set when displaying results from Umkreissuche



$show_thumbs = FLTheme::get_setting( 'fl-archive-show-thumbs' );
$show_full   = apply_filters( 'fl_archive_show_full', FLTheme::get_setting( 'fl-archive-show-full' ) );
$more_text   = FLTheme::get_setting( 'fl-archive-readmore-text' );
$thumb_size  = FLTheme::get_setting( 'fl-archive-thumb-size', 'large' );

$arrMapTaxonomies = [
	'kreis'          => 'klassifikation',
	'klassifikation' => 'kreis'
];
if ( array_key_exists( $taxonomy, $arrMapTaxonomies ) ) {
    if($taxonomy == 'kreis') {
        $terms_for_badges = \mnc\Einrichtung::getBadgesForKreis($post);
    }
    if($taxonomy == 'klassifikation') {
	    $terms_for_badges = \mnc\Einrichtung::getBadgesForKlassifikation($post);
    }
	if(false === $terms_for_badges) {
	    $terms_for_badges = [];
    }
} else {
	$terms_for_badges = [];
}
// $kreise  = $categories = get_the_terms( $post, 'kreis' );
$url     = get_field( 'website', false, false );
$email   = get_field( 'email', false, false );
$adresse = get_field( 'strasse' ) ? get_field( 'strasse' ) . '<br>' . get_field( 'plz' ) . ' ' . get_field( 'ort' ) : '';
$geoloc  = get_field( 'standort' );
if ( isset( $geoloc['lat'] ) ) {
	$legend[]         = $post;
	$post->plzort     = \mnc\Presenter::init()->plzort( $post->ID );
	$post->letter     = \mnc\Presenter::init()->getLetterByIndex( count( $legend ) - 1 );
	$lat              = $geoloc['lat'];
	$lng              = $geoloc['lng'];
	$data             = sprintf( 'data-lat="%s" data-lng="%s" data-label="%s"', $lat, $lng, $post->letter );
	$url_routenplaner = 'https://www.google.com/maps?saddr=My+Location&daddr=' . $lat . ',' . $lng;
} else {
	$lat              = false;
	$lng              = false;
	$data             = '';
	$url_routenplaner = false;
}
if ( isset( $UK ) && $UK->hasDistance() ) {
	$entfernung = floor( $UK->getDistanceOfEinrichtung( $post ) ) . '&nbsp;km';
} else {
	$entfernung = false;
}


do_action( 'fl_before_post' ); ?>
<div class="mnc-einrichtung" <?= $data ?>>
    <h3><?php the_title(); ?></h3>
	<?php if ( get_field( 'untertitel' ) ): ?>
        <p class="mb-2 text-muted"><?php the_field( 'untertitel' ); ?></p>
	<?php endif; ?>
    <div class="badges">


		<?php foreach ( $terms_for_badges as $badge_term ): ?>
            <a href="<?php echo( $badge_term['url']  ); ?>"><span class="badge badge-secondary"><?php echo( $badge_term['name'] ); ?></span></a>
		<?php endforeach; ?>

		<?php if ( $entfernung ): ?>
            <span class="badge badge-info"><?= $entfernung ?></span>
		<?php endif; ?>
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
			$html[]  = Maln::icon_li_material( $content, 'room' );
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
