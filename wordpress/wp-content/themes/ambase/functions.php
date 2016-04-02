<?php

	function ambase_setup() {
		load_theme_textdomain('ambase', get_template_directory() . '/languages');

		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');

		global $content_width;
		if (!isset($content_width)) {
			$content_width = 640;
		}

		register_nav_menus(
			array('main-menu' => __('Main Menu', 'ambase'))
		);
	}
	add_action('after_setup_theme', 'ambase_setup');	

	function ambase_load_scripts() {
		wp_enqueue_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'ambase_load_scripts');
	
	function ambase_enqueue_comment_reply_script() {
		if (get_option('thread_comments')) { 
			wp_enqueue_script('comment-reply'); 
		}
	}
	add_action('comment_form_before', 'ambase_enqueue_comment_reply_script');
	
	function ambase_filter_wp_title($title)	{
		return $title . esc_attr(get_bloginfo('name'));
	}
	add_filter('wp_title', 'ambase_filter_wp_title');

	// Register sidebars
	function ambase_widgets_init() {
		register_sidebar(array (
			'name' => __('Default Sidebar', 'ambase'),
			'id' => 'default-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
	add_action('widgets_init', 'ambase_widgets_init');

	function ambase_custom_pings($comment) {
		$GLOBALS['comment'] = $comment;
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<?php echo comment_author_link(); ?>
			</li>
		<?php 
	}
	
	function ambase_comments_number($count)	{
		if (!is_admin()) {
			global $id;
			$get_comments = get_comments('status=approve&post_id=' . $id); 
			$comments_by_type = separate_comments( $get_comments );
			return count( $comments_by_type['comment'] );
		} else {
			return $count;
		}
	}
	add_filter('get_comments_number', 'ambase_comments_number');

	// Remove certain classes from post entries
	function ambase_post_classes( $classes ) {
	    $class_key = array_search( 'hentry', $classes );	 
	    if ( false !== $class_key ) {
	        unset( $classes[ $class_key ] );
	    }	 
	    return $classes;
	}
	add_filter( 'post_class', 'ambase_post_classes' );

	// Trim default excerpt length
	function ambase_excerpt_length( $length ) {
	    return 50;
	}
	add_filter( 'excerpt_length', 'ambase_excerpt_length' );

	// Change text if excerpt length is reached
	function ambase_excerpt_more( $more ) {
	    return '...';
	}
	add_filter( 'excerpt_more', 'ambase_excerpt_more' );

	// Custom read more link for excerpts
	function ambase_read_more() {
	    return '<div class="read-more"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">Read More</a></div>';
	}

	// Check if there is a custom excerpt and if so, make sure it's not too long
	function ambase_excerpt() {
		if ( has_excerpt() ) {	    
		    return '<p>' . wp_trim_words( get_the_excerpt(), 50 ) . '</p>' . ambase_read_more();
		} else {
			return '<p>' . get_the_excerpt() . '</p>' . ambase_read_more();
		}
	}
