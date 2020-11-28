<?php
	/**
	* Template for displaying the header
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Re-usable variables
	$id = get_queried_object_id();
	$name = get_bloginfo( 'name' );
	$home_url = get_home_url( '/' );

	// Image variables
	$image_path = get_template_directory_uri() . '/assets/images';
	$image_icons = $image_path . '/favicons';
	$image_sizes = array( '180x180', '192x192', '32x32', '16x16' );
	$image_data = array( $image_path . '/publisher-logo.png', '600', '60' );
	if ( get_the_post_thumbnail_url( $id ) ) {
		$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
	}

	// Meta variables for header
	$meta_description = get_the_excerpt() ? get_the_excerpt() : 'Read the \'' . get_the_title() . '\' page on ' . $name . '.';
	$meta_locale = str_replace( '-', '_', get_bloginfo( 'language' ) );

	// Favicon Generate
	function dcbase_get_icon( $image_icons, $value ) {
		echo esc_url( $image_icons . '/favicon-' . $value . '.png' );
	}

	// Escape and echo attribute
	function dcbase_get_meta( $value, $type = 'attr' ) {
		echo ( $type && $type == 'url' ) ? esc_url( $value ) : esc_attr( $value );
	}

	// Function to construct header title
	function dcbase_get_header( $name, $home_url ) {
		$show_head_element = ( is_front_page() || is_home() || is_front_page() && is_home() ) ? true : false;
		$link_html = '<a href="' . esc_url( $home_url ) . '" title="' . esc_attr( $name ) . '" rel="home">' . esc_html( $name ) . '</a>';
		echo $show_head_element ? ( '<h1>' . $link_html . '</h1>' ) : $link_html;
	}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>" />
	<meta name="description" content="<?php dcbase_get_meta( $meta_description ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:local" content="<?php dcbase_get_meta( $meta_locale ); ?>">
	<meta property="og:type" content="<?php dcbase_get_meta( get_post_type( $id ) ); ?>">
	<meta property="og:title" content="<?php dcbase_get_meta( get_the_title() ); ?>">
	<meta property="og:description" content="<?php dcbase_get_meta( $meta_description ); ?>">
	<meta property="og:url" content="<?php dcbase_get_meta( get_page_link( $id ), 'url' ); ?>">
	<meta property="og:site_name" content="<?php dcbase_get_meta( $name ); ?>">
	<meta property="og:image" content="<?php dcbase_get_meta( $image_data[0] ); ?>">
	<meta property="og:image:width" content="<?php dcbase_get_meta( $image_data[1] ); ?>">
	<meta property="og:image:height" content="<?php dcbase_get_meta( $image_data[2] ); ?>">
	<link rel="manifest" href="<?php dcbase_get_meta( $image_icons . '/site.webmanifest', 'url' ); ?>">
	<link rel="apple-touch-icon" sizes="<?php dcbase_get_meta( $image_sizes[0] ); ?>" href="<?php dcbase_get_icon( $image_icons, 'touch' ); ?>">
	<link rel="icon" type="image/png" sizes="<?php dcbase_get_meta( $image_sizes[1] ); ?>" href="<?php dcbase_get_icon( $image_icons, $image_sizes[1] ); ?>">
	<link rel="icon" type="image/png" sizes="<?php dcbase_get_meta( $image_sizes[2] ); ?>" href="<?php dcbase_get_icon( $image_icons, $image_sizes[2] ); ?>">
	<link rel="icon" type="image/png" sizes="<?php dcbase_get_meta( $image_sizes[3] ); ?>" href="<?php dcbase_get_icon( $image_icons, $image_sizes[3] ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--[if lte IE 9]>
		<p class="browser-upgrade">
			<?php _e( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.', 'dcbase' ); ?>
		</p>
	<![endif]-->

	<nav class="navigation navigation-mobile">
		<header class="navigation-mobile-header flex-row-nowrap flex-row-center">
			<div class="navigation-mobile-title">Menu</div>
			<button type="button" class="navigation-mobile-close button-link" role="button" data-toggle-mobile>
				<span class="icon icon-close-thin"></span>
			</button>
		</header>
		<div class="navigation-mobile-content"></div>
	</nav>

	<div class="overlay" data-toggle-mobile></div>

	<header id="header" class="header">
		<div class="wrapper">
			<div class="site-details">
				<div class="site-name"><?php dcbase_get_header( $name, $home_url ); ?></div>
				<div class="site-description"><?php echo get_bloginfo( 'description' ); ?></div>
			</div>
			<div class="search-header">
				<?php get_search_form(); ?>
			</div>
			<nav class="navigation navigation-main" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<button type="button" class="navigation-mobile-trigger button-link" role="button" data-toggle-mobile>
					<span class="button-icon icon icon-filter"></span><span class="button-label">Menu</span>
				</button>
			</nav>
		</div>
	</header>

	<main id="main" class="main">
