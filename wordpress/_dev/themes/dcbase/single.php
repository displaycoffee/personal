<?php
	/**
	* Template for displaying single entries
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();

	// Variables for single post
	$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
?>
<header class="entry-single-header">
	<div class="wrapper">
		<div class="flex-row">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail flex-column">
					<a class="image-wrapper" href="<?php echo esc_url( $thumbnail_url[0] ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<?php
				dcbase_create_title( array(
					'element' => 'h1',
					'class'   => 'entry-title flex-column',
					'url'     => get_the_permalink(),
					'label'   => get_the_title()
				) );
			?>
		</div>
	</div>
</header>
<div class="entry-single-content">
	<?php
		get_template_part( 'partials/layout', 'open' );
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<div class="entry-single">
		<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry">
			<?php
				//get_template_part( 'partials/entry', 'header' );
				//get_template_part( 'partials/entry', 'summary' );
				//comments_template();
			?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php
				//get_template_part( 'partials/entry', 'header' );
				//get_template_part( 'partials/entry', 'summary' );
				if ( comments_open() && ! post_password_required() ) {
					comments_template( '', true );
				}
			?>
		</div>
	</div>
	<?php
		endwhile; endif;
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</div>

<div class="entry-links"><?php wp_link_pages(); ?></div>
<?php get_template_part( 'nav', 'below-single' ); ?>
