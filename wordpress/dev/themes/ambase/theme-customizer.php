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
	            'title' => __( 'Theme Settings', 'ambase' ),
	            'description' => __( 'This is a section for settings.', 'ambase' ),
	            'priority' => 10
	        )
	    );

	    // Section 01 - Text
		$wp_customize->add_setting(
		    'ambase_text',
		    array(
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
		    	'default'  => 'option-01',
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
		            'option-01' => 'Option 01',
		            'option-02' => 'Option 02',
		            'option-03' => 'Option 03'
		        ),
		    )
		);	

		// Need checkbox value to display that label somehow...

	 //    // Section 01 - Checkbox
		// $wp_customize->add_setting(
		//     'ambase_checkbox',
		//     array(
		//         'sanitize_callback' => 'sanitize_text_field',
		//         'sanitize_js_callback' => 'sanitize_text_field'
		//     )
		// );
		// $wp_customize->add_control(
		//     'ambase_checkbox',
		//     array(
		//         'label' => __( 'Checkbox', 'ambase' ),
		//         'section' => 'ambase_section01',
		//         'type' => 'checkbox'
		//     )
		// );
	}
	add_action( 'customize_register', 'ambase_customizer_section' );	

	