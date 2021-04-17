<?php
	/**
	* Template for displaying author archives
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();
?>
<header class="entry-author-header">
	<div class="wrapper">
		<?php
			dcbase_create_title( array(
				'element' => 'h1',
				'class'   => 'entry-author-title',
				'label'   => 'Author: ' . get_the_author(),
				'url'     => get_the_author_meta( 'url' )
			) );
		?>
		<?php if ( get_the_author_meta( 'user_description' ) ) : ?>
			<div class="entry-author-description">
				<p><?php echo esc_html( get_the_author_meta( 'user_description' ) ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</header>
<div class="entry-author-content">
	<?php
		get_template_part( 'partials/layout', 'open' );
		get_template_part( 'loop', 'index' );
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</div>
