<?php
	/**
	* Functions specific to ambase theme
	*/

	// Set up theme options
	function ambase_setup() {
		// Load theme text domain
		load_theme_textdomain( 'ambase', get_template_directory() . '/languages' );

		// Add them support options
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );	

		// Register navigation menus
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu', 'ambase' )
		) );
	}
	add_action( 'after_setup_theme', 'ambase_setup' );	

	// Add theme related scripts
	function ambase_load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'functions', get_template_directory_uri () . '/assets/js/functions.js', 'jquery', '', true );
	}
	add_action( 'wp_enqueue_scripts', 'ambase_load_scripts' );
	
	// Register sidebars
	function ambase_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Default Sidebar', 'ambase' ),
			'id' => 'default-widget-area',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'ambase' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'ambase_widgets_init' );

	// Custom comments template
	function ambase_custom_comments( $comment, $args, $depth ) {
	    if ( 'div' === $args['style'] ) {
	        $add_below = 'comment';
	    } else {
	        $add_below = 'div-comment';
	    }
    ?>
    	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php esc_attr( comment_ID() ) ?>">
	    	<div class="comment-meta">
		    	<p class="author"><?php printf( __( 'Comment by %s', 'ambase' ), get_comment_author_link() ); ?></p>
			    <p class="date"><?php printf( __( 'on %1$s at %2$s', 'ambase' ), get_comment_date(), get_comment_time() ); ?></p>
			</div>
	        <?php 
	        	if ( $args['avatar_size'] != 0 ) {
	        		echo '<div class="comment-thumbnail"><div class="image-wrap">' . get_avatar( $comment, $args['avatar_size'] ) . '</div></div>';
	        	} 
	        ?>
			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="moderation"><em><?php _e( 'Your comment is awaiting moderation.', 'ambase' ); ?></em></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
    		<footer class="comment-footer">
    			<?php edit_comment_link( __( 'Edit', 'ambase' ), '<div class="edit">', '</div>' ); ?>
    			<?php 
    				comment_reply_link( 
    					array_merge( $args, array( 
    						'add_below' => $add_below, 
    						'depth' => $depth, 
    						'max_depth' => $args['max_depth'],
    						'before' => '<div class="reply">',
    						'after' => '</div>' 
    					) ) 
    				); 
    			?>
    		</footer>
    <?php
	}

	// Add comment reply script
	function ambase_enqueue_comment_reply_script() {
		if ( get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
	add_action( 'comment_form_before', 'ambase_enqueue_comment_reply_script' );

	// Get number of comments
	function ambase_comments_number( $count ) {
		if ( !is_admin() ) {
			global $id;
			$get_comments = get_comments( 'status=approve&post_id=' . $id ); 
			$comments_by_type = separate_comments( $get_comments );
			return count( $comments_by_type['comment'] );
		} else {
			return $count;
		}
	}
	add_filter( 'get_comments_number', 'ambase_comments_number' );

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

	// Include customizer choices
	require_once( 'includes/customizer-choices.php' );

	// Include customizer validation
	require_once( 'includes/customizer-validation.php' );

	// Include customizer file
	require_once( 'includes/customizer.php' );