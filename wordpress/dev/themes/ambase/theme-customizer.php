<?php 
	
	// Load customizer for theme
	function ambase_customizer_menu() {
		add_theme_page( __( 'Customize', 'ambase' ), __( 'Customize', 'ambase' ), 'edit_theme_options', 'customize.php' );
	}
	add_action( 'admin_menu', 'ambase_customizer_menu' );

	// Adds individual sections, settings, and controls
	function ambase_customizer_section( $wp_customize ) {
		// Section 01
	    $wp_customize->add_section(
	        'ambase_section01',
	        array(
	            'title' => __( 'Section 01', 'ambase' ),
	            'description' => __( 'These are settings for section 01.', 'ambase' )
	        )
	    );

	    // Section 01 - Text
		$wp_customize->add_setting(
		    'ambase_text',
		    array(
		    	'default' => __( 'Default text field', 'ambase' ),
		        'sanitize_callback' => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_text',
		    array(
		        'label' => __( 'Text', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type' => 'text'
		    )
		);

	    // Section 01 - URL
		$wp_customize->add_setting(
		    'ambase_url',
		    array(
		    	'default' => __( 'http://www.wordpress.com', 'ambase' ),
		        'sanitize_callback' => 'esc_url',
		        'sanitize_js_callback' => 'esc_url'
		    )
		);
		$wp_customize->add_control(
		    'ambase_url',
		    array(
		        'label' => __( 'URL', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type' => 'url'
		    )
		);				

	    // Section 01 - Textarea
		$wp_customize->add_setting(
		    'ambase_textarea',
		    array(
		    	'default' => __( 'Default textarea field', 'ambase' ),
		        'sanitize_callback' => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_textarea',
		    array(
		        'label' => __( 'Textarea', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type' => 'textarea'
		    )
		);	

	    // Section 01 - Select
		$wp_customize->add_setting(
		    'ambase_select',
		    array(
		    	'default' => __( 'Option 01', 'ambase' ),
		        'sanitize_callback' => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_select',
		    array(
		        'label' => __( 'Select', 'ambase' ),
		        'section' => 'ambase_section01',
		        'type' => 'select',
		        'choices' => array(
		            'Option 01' => __( 'Option 01', 'ambase' ),
		            'Option 02' => __( 'Option 02', 'ambase' ),
		            'Option 03' => __( 'Option 03', 'ambase' )
		        ),
		    )
		);	

		// Section 02
	    $wp_customize->add_section(
	        'ambase_section02',
	        array(
	            'title' => __( 'Section 02', 'ambase' ),
	            'description' => __( 'These are settings for section 02.', 'ambase' )
	        )
	    );

	    // Section 02 - Radio
		$wp_customize->add_setting(
		    'ambase_radio',
		    array(
		    	'default' => __( 'Yes', 'ambase' ),
		        'sanitize_callback' => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_radio',
		    array(
		        'label' => __( 'Radio', 'ambase' ),
		        'section' => 'ambase_section02',
		        'type' => 'radio',
		        'choices' => array(
		            'Yes' => __( 'Yes', 'ambase' ),
		            'No' => __( 'No', 'ambase' )
		        ),
		    )
		);

	    // Section 02 - Checkbox
		$wp_customize->add_setting(
		    'ambase_checkbox',
		    array(
		    	'default' => __( '1', 'ambase' ),
		        'sanitize_callback' => 'sanitize_text_field',
		        'sanitize_js_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control(
		    'ambase_checkbox',
		    array(
		        'label' => __( 'Checkbox', 'ambase' ),
		        'section' => 'ambase_section02',
		        'type' => 'checkbox'
		    )
		);
	}
	add_action( 'customize_register', 'ambase_customizer_section' );	

	