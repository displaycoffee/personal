<?php
	// Re-usable variables
	$id = get_queried_object_id();
	$name = get_bloginfo( 'name' );

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
	<header id="header">
		<div id="branding">
			<div id="site-title">
				<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
			</div>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		</div>
		<nav id="menu">
			<div id="search"><?php get_search_form(); ?></div>
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
	</header>
	<main id="container">
		<div class="wrapper">
			<div class="flex-row-nowrap flex-row-20">
				<section id="content" class="flex-column">
