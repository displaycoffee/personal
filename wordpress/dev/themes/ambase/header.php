<?php
	/**
	* Template for displaying the header
	*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">        
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!--[if lt IE 9]>
        <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
        </p>
    <![endif]-->
	<header id="header">
		<p class="site-name">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
		</p>
		<p class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
	</header>
	<nav id="header-nav" class="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</nav>
	<?php get_search_form(); ?>
	<div class="customizer-options">
		<p>This is only here to show how customizer options work.</p>
		<h2>Section 01</h2>
		<p><?php echo esc_html( get_theme_mod( 'ambase_text', __( 'Default text field', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_url', __( 'http://www.wordpress.com', 'ambase' ) ) ); ?></p>
		<?php echo wpautop( esc_html( get_theme_mod( 'ambase_textarea', __( 'Default textarea field', 'ambase' ) ) ) ); ?>
		<p><?php echo esc_html( get_theme_mod( 'ambase_select', __( 'Option 01', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_html( get_theme_mod( 'ambase_radio', __( 'Yes', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_html( get_theme_mod( 'ambase_checkbox', __( '1', 'ambase' ) ) ); ?></p>
		<h2>Section 02</h2>
		<p><?php echo esc_html( get_theme_mod( 'ambase_date', __( '2017-01-01', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_html( get_theme_mod( 'ambase_page', __( '0', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_html( get_theme_mod( 'ambase_color', __( '#000000', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_file', __( 'No file selected.', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_image', __( 'No image selected.', 'ambase' ) ) ); ?></p>
		<h2>Social Media Fields</h2>
		<p><?php echo esc_url( get_theme_mod( 'ambase_facebook', __( 'http://www.facebook.com', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_gplus', __( 'http://www.google.com', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_linkedin', __( 'http://www.linkedin.com', 'ambase' ) ) ); ?></p>
		<p><?php echo esc_url( get_theme_mod( 'ambase_twitter', __( 'http://www.twitter.com', 'ambase' ) ) ); ?></p>
	</div>
	<section class="content">
		<div class="wrapper">		