<?php get_header(); ?>
<div id="content" role="main">
	<div id="post-0" class="post not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'ambase' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'ambase' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>