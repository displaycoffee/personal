<?php
	/**
	* Template for displaying a basic post loop
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();

	// Config for pagination
	$pagination_show = ( $wp_query->max_num_pages > 1 ) ? true : false;
	$pagination_config = array(
		'end_size'  => 1,
		'mid_size'  => 3,
		'prev_text' => __( 'Previous', $config->lang ),
		'next_text' => __( 'Next', $config->lang )
	);

	// No entries text
	$no_entries = is_search() ? 'No entries match your search.' : 'No entries found.';
?>
<?php if ( have_posts() ) : ?>
	<div class="entry-multiple">
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry">
				<?php
					get_template_part( 'partials/entry', 'header' );
					get_template_part( 'partials/entry', 'summary' );
					comments_template();
				?>
			</div>
		<?php endwhile; ?>
	</div>
	<?php if ( $pagination_show ) : ?>
		<nav class="navigation navigation-pagination">
			<div class="pagination">
				<?php echo paginate_links( $pagination_config ) ?>
			</div>
		</nav>
	<?php endif; ?>
<?php wp_reset_postdata(); else : ?>
	<div class="entry-none">
		<p><?php _e( $no_entries, $config->lang ); ?></p>
		<p>
			<?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', $config->lang ), '<a href="', esc_url( $config->home ), '">home</a>' ); ?>
		</p>
	</div>
<?php endif; ?>
