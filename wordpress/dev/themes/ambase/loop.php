<?php
	/**
	* Template for displaying a basic post loop
	*/
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>	
		<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
			<?php 
				if ( is_singular() ) { 
					echo '<h1>'; 
				} else { 
					echo '<h2>'; 
				} 
			?>
				<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title_attribute() ); ?>">
					<?php the_title(); ?>
				</a>
			<?php 
				if ( is_singular() ) { 
					echo '</h1>'; 
				} else { 
					echo '</h2>'; 
				} 
			?>
			<div class="meta">
				<p class="author"><?php the_author_posts_link(); ?></p>
				<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
			</div>
			<?php 
				if ( has_post_thumbnail() ) { 
					echo '<div class="thumbnail">' . get_the_post_thumbnail() . '</div>'; 
				} 
			?>
			<div class="entry">
				<?php 
					if ( is_archive() || is_search() ) { 
						echo ambase_excerpt();
					} else {
						the_content();
					}
				?>
			</div>
			<div class="categories">
				<?php _e( '<strong>Categories:</strong> ', 'ambase' ); ?><?php the_category( ', ' ); ?>
			</div>
			<?php if ( has_tag() ) { ?>
				<div class="tags">
					<?php the_tags( '<strong>Tags:</strong> ' ); ?>
				</div>
			<?php } ?>
			<?php 
				if ( comments_open() ) { 
					echo '<div class="comments"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( __( 'Comments', 'ambase' ) ) . '</a></div>'; 
				} 
			?>
			<?php edit_post_link(); ?>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<div id="post-0" class="post not-found">
		<p>
			<?php 
				if ( is_search() ) { 
					_e( 'No posts match your search.', 'ambase' );
				} else {
					_e( 'No posts found.', 'ambase' );
				}
			?>
		</p>
		<p>
			<?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', 'ambase' ), '<a href="', home_url( '/' ), '">home</a>' ); ?>
		</p>		
	</div>
<?php endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>