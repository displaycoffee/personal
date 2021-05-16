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
		$section_class = 'entry-single';
		$flex_row = '';
		$flex_column = '';
	} else {
		$section_class = 'entry-multiple';
		$flex_row = ' flex-row';
		$flex_column = ' flex-column';
	}
?>
<section class="<?php echo esc_attr( $section_class ); ?>-section entry-<?php echo esc_attr( $config->type ); ?>-section">
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
					<span class="entry-meta-separator">|</span>
					<span class="entry-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				</div>
				<?php get_template_part( 'partials/entry', 'edit' );?>
			</header>
			<div class="entry-body<?php echo esc_attr( $flex_row ); ?>">
				<?php
					if ( !is_singular() ) {
						get_template_part( 'partials/entry', 'thumbnail' );
					}
				?>
				<div class="entry-content<?php echo esc_attr( $flex_column ); ?>">
					<?php
						if ( dcbase_is_archive() ) {
							the_excerpt();
						} else {
							the_content();
						}
					?>
				</div>
				<?php get_template_part( 'partials/entry', 'pages' );?>
			</div>
			<?php if ( is_singular() ) : ?>
				<footer class="entry-footer">
					<div class="entry-details">
						<span class="entry-details-categories">
							<?php esc_html_e( 'Categories: ',  $config->lang ); ?><?php the_category( ', ' ); ?>
						</span>
						<span class="entry-details-tags"><?php the_tags(); ?></span>
						<?php if ( comments_open() ) : ?>
							<span class="entry-details-separator">|</span>
							<span class="entry-details-comments">
								<a href="<?php echo esc_url( get_comments_link() ) ?>"><?php echo sprintf( esc_html__( 'Comments', $config->lang ) ) ?></a>
							</span>
						<?php endif; ?>
					</div>
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
