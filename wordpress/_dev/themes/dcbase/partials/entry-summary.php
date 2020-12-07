<?php
	/**
	* Template for displaying the entry summary
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Determine if summary should show or not
	$show_summary = ( has_post_thumbnail() || get_the_excerpt() || ( is_search() && wp_link_pages() ) ) ? true : false;
?>
<?php if ( $show_summary ) : ?>
	<div class="entry-summary flex-row">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail flex-column">
				<a class="image-wrapper" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		<?php endif; ?>
		<?php if ( get_the_excerpt() ) : ?>
			<div class="entry-content flex-column">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
		<?php if ( is_search() && wp_link_pages() ) : ?>
			<div class="entry-links flex-column"><?php wp_link_pages(); ?></div>
		<?php endif; ?>
	</div>
<?php endif; ?>
