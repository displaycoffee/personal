<?php 
	/**
	* Load and create theme customizer options
	*/	

	// Adds individual sections, settings, and controls
	function ambase_customizer_section( $wp_customize ) {
		// Section 01
	    $wp_customize->add_section(
	        'ambase_section01',
	        array(
	            'title'		  => __( 'Section 01', 'ambase' ),
	            'description' => __( 'These are settings for section 01.', 'ambase' )
	        )
	    );

	    // Section 01 - Text
		$wp_customize->add_setting(
		    'ambase_text',
		    array(
		    	'default'			   => __( 'Default text field', 'ambase' ),
		        'sanitize_callback'	   => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_text',
		    array(
		        'label'	  => __( 'Text', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'text'
		    )
		);

	    // Section 01 - URL
		$wp_customize->add_setting(
		    'ambase_url',
		    array(
		    	'default'			   => __( 'http://www.wordpress.com', 'ambase' ),
		        'sanitize_callback'	   => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_url',
		    array(
		        'label'	  => __( 'URL', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'url'
		    )
		);

	    // Section 01 - Textarea
		$wp_customize->add_setting(
		    'ambase_textarea',
		    array(
		    	'default'			   => __( 'Default textarea field', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanitize_textarea',
		        'sanitize_js_callback' => 'ambase_sanitize_textarea'
		    )
		);
		$wp_customize->add_control(
		    'ambase_textarea',
		    array(
		        'label'	  => __( 'Textarea', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'textarea'
		    )
		);	

	    // Section 01 - Select
		$wp_customize->add_setting(
		    'ambase_select',
		    array(
		    	'default'			   => __( 'Option 01', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanitize_select',
		        'sanitize_js_callback' => 'ambase_sanitize_select'
		    )
		);
		$wp_customize->add_control(
		    'ambase_select',
		    array(
		        'label'	  => __( 'Select', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'select',
		        'choices' => ambase_select_choices()
		    )
		);

	    // Section 01 - Radio
		$wp_customize->add_setting(
		    'ambase_radio',
		    array(
		    	'default'			   => __( 'Yes', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanitize_radio',
		        'sanitize_js_callback' => 'ambase_sanitize_radio'
		    )
		);
		$wp_customize->add_control(
		    'ambase_radio',
		    array(
		        'label'	  => __( 'Radio', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'radio',
		        'choices' => ambase_radio_choices()
		    )
		);

	    // Section 02 - Checkbox
		$wp_customize->add_setting(
		    'ambase_checkbox',
		    array(
		    	'default'			   => __( '1', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanatize_checkbox',
		        'sanitize_js_callback' => 'ambase_sanatize_checkbox'
		    )
		);
		$wp_customize->add_control(
		    'ambase_checkbox',
		    array(
		        'label'	  => __( 'Checkbox', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type'	  => 'checkbox'
		    )
		);

        // Section 02
	    $wp_customize->add_section(
	        'ambase_section02',
	        array(
	            'title'		  => __( 'Section 02', 'ambase' ),
	            'description' => __( 'These are settings for section 02.', 'ambase' )
	        )
	    );

		// Section 01 - Date picker
		$wp_customize->add_setting(
		    'ambase_date',
		    array(
		    	'default'			   => __( '', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanitize_date',
		        'sanitize_js_callback' => 'ambase_sanitize_date'
		    )
		);
		$wp_customize->add_control(
		    new AMBASE_Date_Picker( $wp_customize, 'ambase_date', 
			    array(		        
			        'label'	   => __( 'Date Picker', 'ambase' ),
			        'section'  => 'ambase_section02',
			        'settings' => 'ambase_date'
			    )
			)
		);

		// Section 02 - Page list
		$wp_customize->add_setting(
		    'ambase_page',		    
		    array(
		    	'default'			   => __( '0', 'ambase' ),
		        'sanitize_callback'	   => 'ambase_sanitize_number',
		        'sanitize_js_callback' => 'ambase_sanitize_number'
		    )
		);		 
		$wp_customize->add_control(
		    'ambase_page',
		    array(		        
		        'label'	  => __( 'Choose a page', 'ambase' ),
		        'section' => 'ambase_section02',
		        'type'	  => 'dropdown-pages'
		    )
		);

		// Section 02 - Color
		$wp_customize->add_setting(
		    'ambase_color',		    
		    array(
		    	'default'			   => __( '#000000', 'ambase' ),
		        'sanitize_callback'	   => 'sanitize_hex_color',
		        'sanitize_js_callback' => 'sanitize_hex_color'
		    )
		);		 
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
			    'ambase_color',
			    array(		        
			        'label'	   => __( 'Color', 'ambase' ),
			        'section'  => 'ambase_section02',
			        'settings' => 'ambase_color'
			    )
		    )
		);

		// Section 02 - File upload
		$wp_customize->add_setting(
		    'ambase_file'
		);		
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control(
		        $wp_customize,
		        'ambase_file',
		        array(
		            'label'	   => __( 'File Upload', 'ambase' ),
		            'section'  => 'ambase_section02',
		            'settings' => 'ambase_file'
		        )
		    )
		);

		// Section 02 - Image upload
		$wp_customize->add_setting(
		    'ambase_image'
		);		
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'ambase_image',
		        array(
		            'label'	   => __( 'Image Upload', 'ambase' ),
		            'section'  => 'ambase_section02',
		            'settings' => 'ambase_image'
		        )
		    )
		);

		// Social Media
	    $wp_customize->add_section(
	        'ambase_social',
	        array(
	            'title'		  => __( 'Social Media', 'ambase' ),
	            'description' => __( 'Add links for social media.', 'ambase' )
	        )
	    );

	    // Social Media - Facebook
		$wp_customize->add_setting(
		    'ambase_facebook',
		    array(
		    	'default'			   => __( 'http://www.facebook.com', 'ambase' ),
		        'sanitize_callback'	   => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_facebook',
		    array(
		        'label'	  => __( 'Facebook', 'ambase' ),
		        'section' => 'ambase_social',
		        'type'	  => 'url'
		    )
		);		

	    // Social Media - Google+
		$wp_customize->add_setting(
		    'ambase_gplus',
		    array(
		    	'default'			   => __( 'http://www.google.com', 'ambase' ),
		        'sanitize_callback'	   => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_gplus',
		    array(
		        'label'	  => __( 'Google+', 'ambase' ),
		        'section' => 'ambase_social',
		        'type'	  => 'url'
		    )
		);	

	    // Social Media - LinkedIn
		$wp_customize->add_setting(
		    'ambase_linkedin',
		    array(
		    	'default'			   => __( 'http://www.linkedin.com', 'ambase' ),
		        'sanitize_callback'	   => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_linkedin',
		    array(
		        'label'	  => __( 'LinkedIn', 'ambase' ),
		        'section' => 'ambase_social',
		        'type'	  => 'url'
		    )
		);	

	    // Social Media - Twitter
		$wp_customize->add_setting(
		    'ambase_twitter',
		    array(
		    	'default'			   => __( 'http://www.twitter.com', 'ambase' ),
		        'sanitize_callback'	   => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_twitter',
		    array(
		        'label'	  => __( 'Twitter', 'ambase' ),
		        'section' => 'ambase_social',
		        'type'	  => 'url'
		    )
		);							
	}
	add_action( 'customize_register', 'ambase_customizer_section' );