<?php
	/**
	* Template for displaying main entry content
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object
	$config = dcbase_config();

	// Properties for single versus multiple
	if ( is_singular() ) {
		$section_class = $config->classes->single;
		$flex_row = '';
		$flex_column = '';
	} else {
		$section_class = $config->classes->multi;
		$flex_row = ' flex-row';
		$flex_column = ' flex-column';
	}
?>
<section class="<?php echo $section_class ?>-section entry-<?php echo $config->type ?>-section">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry">

			<header class="entry-header">
				<?php
					// Don't add title on single post pages
					if ( !is_singular() ) {
						dcbase_create_title( array(
							'element' => 'h2',
							'class'   => 'entry-title',
							'url'     => get_the_permalink(),
							'label'   => get_the_title(),
							'rel'     => 'bookmark'
						) );
					}

				?>

				<div class="entry-meta">
					<span class="entry-meta-author"><?php the_author_posts_link(); ?></span>
					<span class="entry-meta-separator"> | </span>
					<span class="entry-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				</div>

				<div class="entry-edit">
					<?php edit_post_link(); ?>
				</div>

			</header>

			<div class="entry-wrapper<?php echo $flex_row; ?>">

				<?php
					if ( !is_singular() ) {
						get_template_part( 'partials/entry', 'thumbnail' );
					}
				?>

				<div class="entry-content<?php echo $flex_column; ?>">
					<?php
						if ( dcbase_is_archive() ) {
							the_excerpt();
						} else {
							the_content();
						}
					?>
				</div>

				<div class="entry-links<?php echo $flex_column; ?>">
					<?php wp_link_pages(); ?>
				</div>

			</div>

			<?php if ( is_singular() ) : ?>

				<footer class="entry-footer">
					<span class="cat-links">
						<?php esc_html_e( 'Categories: ', 'dcbase' ); ?><?php the_category( ', ' ); ?>
					</span>

					<span class="tag-links"><?php the_tags(); ?></span>

					<?php if ( comments_open() ) : ?>
						<span class="meta-sep">|</span>
						<span class="comments-link">
							<a href="<?php echo esc_url( get_comments_link() ) ?>"><?php echo sprintf( esc_html__( 'Comments', 'dcbase' ) ) ?></a>
						</span>
					<?php endif; ?>

				</footer>

				<?php
					if ( comments_open() && !post_password_required() ) {
						comments_template( '', true );
					}
				?>

			<?php else : ?>

				<?php comments_template(); ?>

			<?php endif; ?>

		</div>
	<?php endwhile; endif; ?>
</section>
<?php get_template_part( 'partials/navigation' ); ?>
