<?php
	/**
	* Template for displaying the header
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object and other variables to header
	$config = dcbase_config();
	$id = get_queried_object_id();

	// Meta variables for header
	$meta_description = get_the_excerpt() ? get_the_excerpt() : 'Read the \'' . get_the_title() . '\' page on ' . $config->name . '.';
	$meta_locale = str_replace( '-', '_', get_bloginfo( 'language' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>" />
		<meta name="description" content="<?php echo esc_attr( $meta_description ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:local" content="<?php echo esc_attr( $meta_locale ); ?>">
		<meta property="og:type" content="<?php echo esc_attr( get_post_type( $id ) ); ?>">
		<meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $meta_description ); ?>">
		<meta property="og:url" content="<?php echo esc_url( get_page_link( $id ) ); ?>">
		<meta property="og:site_name" content="<?php echo esc_attr( $config->name ); ?>">
		<meta property="og:image" content="<?php echo esc_url( $config->images->thumbnail ); ?>">
		<meta property="og:image:width" content="<?php echo esc_attr( $config->images->thumbnail_width ); ?>">
		<meta property="og:image:height" content="<?php echo esc_attr( $config->images->thumbnail_height ); ?>">
		<link rel="manifest" href="<?php echo esc_url( $config->paths->favicons . '/site.webmanifest' ); ?>">
		<link rel="apple-touch-icon" sizes="<?php echo esc_attr( $config->images->sizes[0] ); ?>" href="<?php dcbase_get_icon( 'touch' ); ?>">
		<link rel="icon" type="image/png" sizes="<?php echo esc_attr( $config->images->sizes[1] ); ?>" href="<?php dcbase_get_icon( 1 ); ?>">
		<link rel="icon" type="image/png" sizes="<?php echo esc_attr( $config->images->sizes[2] ); ?>" href="<?php dcbase_get_icon( 2 ); ?>">
		<link rel="icon" type="image/png" sizes="<?php echo esc_attr( $config->images->sizes[3] ); ?>" href="<?php dcbase_get_icon( 3 ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lte IE 9]>
			<p class="browser-upgrade">
				<?php _e( 'You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.', $config->lang ); ?>
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
					<div class="site-name">
						<?php
							dcbase_create_title( array(
								'element' => dcbase_is_home() ? 'h1' : '',
								'class'   => 'site-title',
								'url'     => $config->home,
								'label'   => $config->name,
								'rel'     => 'home'
							) );
						?>
					</div>
					<div class="site-description"><?php echo get_bloginfo( 'description' ); ?></div>
				</div>
				<div class="search-header">
					<?php get_search_form(); ?>
				</div>
				<nav class="navigation navigation-main" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					<button type="button" class="navigation-mobile-trigger button-link" role="button" data-toggle-mobile>
						<span class="button-icon icon icon-gear"></span><span class="button-label">Menu</span>
					</button>
				</nav>
			</div>
		</header>
		<main id="main" class="main">
