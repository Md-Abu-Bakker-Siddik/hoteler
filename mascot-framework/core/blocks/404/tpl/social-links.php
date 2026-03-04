<?php
$social_links = hoteler_get_redux_option( 'social-links-ordering', false, 'Enabled' );
?>

<ul class="<?php echo esc_attr( apply_filters( 'hoteler_404_social_info', 'styled-icons icon-dark icon-rounded icon-sm') ); ?>">
	<?php
	if( $social_links ): foreach( $social_links as $key => $value ) {
		if( !_empty( hoteler_get_redux_option( 'social-links-url-'.$key ) ) ) :
	?>
	<li><a href="<?php echo esc_url( hoteler_get_redux_option( 'social-links-url-'.$key ) ); ?>" target="<?php $target = hoteler_get_redux_option( 'social-links-open-in-window', '_blank' ); echo ( ( $target == '' ) ? esc_attr( '_self' ) : esc_attr( $target ) ); ?>"><i class="fa fa-<?php echo esc_attr( $key ); ?>"></i></a></li>
	<?php endif; } endif; ?>
</ul>