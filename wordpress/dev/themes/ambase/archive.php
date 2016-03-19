<?php
	/**
	* Template for displaying archive pages
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*/

	get_header(); 
?>
<article>
	<div class="title">
		<h1>
			<?php 
				if ( is_day() ) { 
					printf( __( 'Day: %s', 'ambase' ), get_the_time( get_option( 'date_format' ) ) ); 
				} elseif ( is_month() ) { 
					printf( __( 'Month: %s', 'ambase' ), get_the_time( 'F Y' ) ); 
				} elseif ( is_year() ) { 
					printf( __( 'Year: %s', 'ambase' ), get_the_time( 'Y' ) ); 
				} else { 
					_e( 'Archives', 'ambase' ); 
				}
			?>			
		</h1>
	</div>
	<?php get_template_part( 'loop' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>