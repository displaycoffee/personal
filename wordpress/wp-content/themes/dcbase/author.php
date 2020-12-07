<?php
	/**
	* Template for displaying author archives
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<?php
	get_header();
	get_template_part( 'partials/layout', 'open' );
?>
<header class="entry-author-header">
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
</header>
<?php
	get_template_part( 'loop', 'index' );
	get_template_part( 'partials/layout', 'close' );
	get_footer();
?>
