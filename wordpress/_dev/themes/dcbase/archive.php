<?php
	/**
	* Template for displaying archives
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();

	// Add config object
	$config = dcbase_config();
?>
<header class="<?php echo $config->classes->multi ?>-header entry-<?php echo $config->type ?>-header">
	<div class="wrapper">
		<?php
			dcbase_create_title( array(
				'element' => 'h1',
				'class'   => $config->classes->multi . '-title',
				'label'   => single_term_title( '', false )
			) );
		?>
		<?php if ( get_the_archive_description() ) : ?>
			<div class="<?php echo $config->classes->multi ?>-description">
				<?php echo get_the_archive_description(); ?>
			</div>
		<?php endif; ?>
	</div>
</header>
<?php get_template_part( 'loop', 'index' ); ?>
