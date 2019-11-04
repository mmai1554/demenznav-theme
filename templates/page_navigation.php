<?php
global $wp_query;
global $paged;

$label_back = __( '&laquo; Zurück', 'fl-automator' );
$label_next = __( 'Weiter &raquo;', 'fl-automator' );

$link_back  = get_previous_posts_link( __( '&laquo; Zurück', 'fl-automator' ) );
$link_next  = get_next_posts_link( __( 'Weiter &raquo;', 'fl-automator' ) );

if ( ! $link_back ) {
	$link_back = '<a href="" class="btn-link  disabled">' . $label_back . '</a>';
}
if ( ! $link_next ) {
	$link_next = '<a href="" class="btn-link disabled">' . $label_next . '</a>';
}

?>
<div class="d-flex justify-content-between">
    <div><?= $link_back ?></div>
    <div>Seite <?= get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ?> von <?= $wp_query->max_num_pages ?></div>
    <div><?= $link_next ?></div>
</div>