<?php
	/**
	* Template part for displaying an Author biography
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1><?php the_author(); ?></h1>
	</header>	
	<div id="author" class="author-bio">
		<header class="author-header">
			<h3><?php _e( 'About', 'ambase' ); ?></h3>
		</header>	
		<div class="author-meta">
			<p class="website">
				<a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ) ?>" title="<?php printf( __( '%s\'s Website', 'ambase' ), esc_attr ( get_the_author() ) ) ?>">Website</a>
			</p>
		</div>
		<?php 
			$author_id = get_the_author_meta( 'ID' );
			$author_avatar = get_avatar( $author_id, 200, '', esc_attr( get_the_author() ) );
			if ( $author_avatar ) { 
				echo '<div class="author-thumbnail">' . $author_avatar . '</div>'; 
			} 
		?>
		<?php 
			if ( '' != get_the_author_meta( 'user_description' ) ) {
				echo '<div class="author-biography"><p>' .  get_the_author_meta( 'user_description' ) . '</p></div>';
			}
		?>
	</div>
	<h2><?php printf( __( 'Posts by %s', 'ambase' ), get_the_author() ) ?></h2>
	<?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>