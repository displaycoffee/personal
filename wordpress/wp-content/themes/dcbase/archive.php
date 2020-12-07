<?php
	/**
	* Template for displaying archives
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<?php
	get_header();
	get_template_part( 'partials/layout', 'open' );
?>
<header class="entry-archive-header">
	<?php
		dcbase_create_title( array(
			'element' => 'h1',
			'class'   => 'entry-archive-title',
			'label'   => single_term_title( '', false )
		) );
	?>
	<?php if ( get_the_archive_description() ) : ?>
		<div class="entry-archive-description">
			<?php echo get_the_archive_description(); ?>
		</div>
	<?php endif; ?>
</header>
<?php
	get_template_part( 'loop', 'index' );
	get_template_part( 'partials/layout', 'close' );
	get_footer();
?>
