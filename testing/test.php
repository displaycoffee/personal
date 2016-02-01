<?php 

	// Create a prefix for input fields
	$prefix = 'xyz_';

	$optionFields = array(
		'name' => 'Text box Title 01',
		'id' => $prefix . '_text_section_01',
		'desc' => '<p>put something here 01.</p>',		
		'fields' => array(
			array(
				'label' => 'Text box',
				'desc' => 'Enter something here if you want. If not, just remove it.',
				'id' => $prefix . 'text',
				'name' => 'pu_theme_options[' . $prefix . 'text' . ']',
				'type' => 'text',
				'validate' => 'sanitize_text_field'
			),             
			array(
				'label' => 'URL',
				'desc' => 'Enter something here if you want. If not, just remove it.',
				'id' => $prefix . 'url',
				'name' => 'pu_theme_options[' . $prefix . 'url' . ']',
				'type' => 'url',
				'validate' => 'esc_url'
			)
		),
		'name' => 'Text box Title 02',
		'id' => $prefix . '_text_section_02',
		'desc' => '<p>put something here 02.</p>',			
		'fields' => array(
			array(
				'label' => 'Image URL',
				'desc' => 'Select an image or enter a valid image URL.',
				'id' => $prefix . 'media',
				'name' => 'pu_theme_options[' . $prefix . 'media' . ']',
				'type' => 'media',
				'image_select' => $prefix . 'imageSelect',
				'image_reset' => $prefix . 'imageReset',
				'validate' => 'esc_url'
			)
		)		
	);
	
?>