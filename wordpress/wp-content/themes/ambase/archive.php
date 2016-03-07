<?php get_header(); ?>
<div id="content" role="main">
	<h1 class="entry-title">
		<?php 
			if ( is_day() ) { 
				printf( __( 'Daily Archives: %s', 'ambase' ), get_the_time( get_option( 'date_format' ) ) ); 
			} elseif ( is_month() ) { 
				printf( __( 'Monthly Archives: %s', 'ambase' ), get_the_time( 'F Y' ) ); 
			} elseif ( is_year() ) { 
				printf( __( 'Yearly Archives: %s', 'ambase' ), get_the_time( 'Y' ) ); 
			} else { 
				_e( 'Archives', 'ambase' ); 
			}
		?>
	</h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>