<?php
	/**
	* Template for displaying the entry thumbnail
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Determine the url and class around the image
	if ( is_single() ) {
		$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
		$thumbnail_class = '';
	} else {
		$thumbnail_url = get_the_permalink();
		$thumbnail_class = ' flex-column';
	}
?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-thumbnail<?php echo esc_attr( $thumbnail_class ); ?>">
		<a class="image-wrapper" href="<?php echo esc_url( $thumbnail_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
<?php endif; ?>
