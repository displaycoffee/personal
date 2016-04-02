<?php
	/**
	* Template for displaying image attachments
	*/

	get_header(); 
?>
<?php global $post; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
		<header class="main-title">
			<h1>
				<?php the_title(); ?>
			</h1>
		</header>
		<div class="post-single">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h3>
						<?php _e( 'From:', 'ambase' ); ?>
						<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo  esc_attr( get_the_title( $post->post_parent ) ); ?>">
							<?php echo get_the_title( $post->post_parent ); ?>
						</a>
					</h3>
				</header>			
				<?php get_template_part( 'partials/entry', 'meta' ); ?>
				<div class="entry-content">
					<?php 
						// Attachment tiles for attributes and such
						$attachment_title = get_the_title();
						$title = $attachment_title ? ' title="' . esc_attr( $attachment_title ) . '"' : '';

						// If the attachement is an image, display it
						if ( wp_attachment_is_image( $post->ID ) ) { 

							// Image details
							$attachment = wp_get_attachment_image_src( $post->ID, 'large' );
							$attachment_alt = get_post_meta( $post->ID, '_wp_attachment_image_alt', true );
							$attachment_width = $attachment[1];
							$attachment_height = $attachment[2];						
							$alt = $attachment_alt ? ' alt="' . esc_attr( $attachment_alt ) . '"' : '';

							$attachment_display = '<p><a href="' . esc_url( wp_get_attachment_url() ) . '"' . $title . '>';
							$attachment_display .=  '<img src="' . esc_url( wp_get_attachment_url() ) . '" width="' . esc_attr( $attachment_width ) . '" height="' . esc_attr( $attachment_height ) . '"' . $alt . ' />';
							$attachment_display .=  '</a></p>';						
						} else {
							$attachment_display = '<p><a href="' . esc_url( wp_get_attachment_url() ) . '"' . $title . '>';
							$attachment_display .= basename( $post->guid );
							$attachment_display .=  '</a></p>';	
						}

						echo $attachment_display;
					?>
					<?php 
						// Check if the attachment has a caption
						$excerpt = get_the_excerpt();
						if ( !empty( $excerpt ) ) {
							echo '<p class="caption">' . $excerpt . '</p>';
						} 
					?>
				</div>
			</div>
		</div>
		<nav class="simple-navigation">
			<div class="previous"><?php previous_image_link( false, 'Previous' ); ?></div>
			<div class="next"><?php next_image_link( false, 'Next' ); ?></div>					
		</nav>		
		<?php comments_template(); ?>
	</article>
<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>