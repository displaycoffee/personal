<?php if ( is_single() ) : ?>
	<?php $args = array(
	'prev_text' => '<span class="meta-nav">&larr;</span> %title',
	'next_text' => '%title <span class="meta-nav">&rarr;</span>'
	);
	the_post_navigation( $args );
	?>
<?php else : ?>
	<?php $args = array(
	'prev_text' => sprintf( esc_html__( '%s older', 'dcbase' ), '<span class="meta-nav">&larr;</span>' ),
	'next_text' => sprintf( esc_html__( 'newer %s', 'dcbase' ), '<span class="meta-nav">&rarr;</span>' )
	);
	the_posts_navigation( $args );
	?>
<?php endif; ?>
