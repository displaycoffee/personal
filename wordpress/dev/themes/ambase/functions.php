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
	
	function ambase_title($title) {
		if ($title == '') {
			return '&rarr;';
		} else {
			return $title;
		}
	}
	add_filter('the_title', 'ambase_title');

	
	function ambase_filter_wp_title($title)	{
		return $title . esc_attr(get_bloginfo('name'));
	}
	add_filter('wp_title', 'ambase_filter_wp_title');

	
	function ambase_widgets_init() {
		register_sidebar(array (
			'name' => __('Sidebar Widget Area', 'ambase'),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</li>",
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