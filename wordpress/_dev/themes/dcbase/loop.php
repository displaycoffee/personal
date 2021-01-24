<?php
	/**
	* Template for displaying a basic post loop
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object
	$config = dcbase_config();

	// Determine if summary block show or not
	$show_summary = ( has_post_thumbnail() || get_the_excerpt() || ( is_search() && wp_link_pages() ) ) ? true : false;
?>
<section class="<?php echo $config->classes->multi ?>-section entry-<?php echo $config->type ?>-section">
	<?php get_template_part( 'partials/layout', 'open' ); ?>
	<?php if ( have_posts() ) : ?>
		<?php echo get_page_template() ?>
		<div class="<?php echo $config->classes->multi ?>-">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry">
					<?php get_template_part( 'partials/entry', 'header' ); ?>
					<?php if ( $show_summary ) : ?>
						<div class="entry-section flex-row">
							<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
							<?php if ( get_the_excerpt() ) : ?>
								<div class="entry-content flex-column">
									<?php the_excerpt(); ?>
								</div>
							<?php endif; ?>
							<?php get_template_part( 'partials/entry', 'links' ); ?>
						</div>
					<?php endif; ?>
					<?php comments_template(); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php get_template_part( 'partials/entry', 'navigation' ); ?>
	<?php wp_reset_postdata(); else : ?>
		<?php get_template_part( 'partials/entry', 'none' ); ?>
	<?php endif; ?>
	<?php
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</section>
