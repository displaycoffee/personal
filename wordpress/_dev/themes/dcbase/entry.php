<?php
	/**
	* Template for displaying main entry content
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object
	$config = dcbase_config();

	// Properties for single versus multiple
	if ( is_singular() ) {
		$section_class = $config->classes->single;
		$show_single = true;
	} else {
		$section_class = $config->classes->multi;
		$show_single = false;
	}
?>
<section class="<?php echo $section_class ?>-section entry-<?php echo $config->type ?>-section">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry">
			<?php get_template_part( 'partials/entry', 'header' ); ?>
			<div class="entry-wrapper flex-row">
				<?php
					get_template_part( 'partials/entry', 'thumbnail' );
					get_template_part( 'partials/entry', 'content' );
					get_template_part( 'partials/entry', 'links' );
				?>
			</div>
			<?php
				if ( $show_single ) {
					get_template_part( 'partials/entry', 'footer' );
				}
			?>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
</section>
