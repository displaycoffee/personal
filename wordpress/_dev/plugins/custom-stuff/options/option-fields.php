<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Options array for all sections and fields
	$option_fields = array(
		$obj['prefix'] . '-option-box01' => array(
			'parent_slug'   => 'edit.php?post_type=' . $obj['prefix'] . '-post-type',
			'page_title'    => __( 'Settings', $obj['lang'] ),
			'menu_title'    => __( 'Settings', $obj['lang'] ),
			'capability'    => 'manage_options',
			'menu_slug'     => $obj['prefix'] . '-options.php',
			'options_group' => $obj['prefix'] . '-options',
			'sections'      => array(
				$obj['prefix'] . '-option-section-01' => array(
					'title' => __( 'Section 01', $obj['lang'] ),
					'desc'  => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] )
				),
				$obj['prefix'] . '-option-section-02' => array(
					'title' => __( 'Section 02', $obj['lang'] ),
					'desc'  => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] )
				)
			),
			'fields'        => array(
				$obj['prefix'] . '-option-text' => array(
					'label'    => __( 'Text box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'validate' => $obj['prefix'] . '_sanitize_html',
					'section'  => $obj['prefix'] . '-option-section-01'
				),
				$obj['prefix'] . '-option-url' => array(
					'label'    => __( 'URL', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'url',
					'validate' => 'esc_url',
					'section'  => $obj['prefix'] . '-option-section-01'
				),
				$obj['prefix'] . '-option-multitext' => array(
					'label'    => __( 'Multiple Text Boxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_html',
					'section'  => $obj['prefix'] . '-option-section-01',
					'options'  => array(
						$obj['prefix'] . '-option-multitext01' => array(
							'label' => __( 'Multi Text 01', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multitext02' => array(
							'label' => __( 'Multi Text 02', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multitext03' => array(
							'label' => __( 'Multi Text 03', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multitext04' => array(
							'label' => __( 'Multi Text 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-option-textarea' => array(
					'label'    => __( 'Textarea', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'textarea',
					'validate' => $obj['prefix'] . '_sanitize_textarea',
					'section'  => $obj['prefix'] . '-option-section-01'
				),
				$obj['prefix'] . '-option-select' => array(
					'label'    => __( 'Select Box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'select',
					'validate' => $obj['prefix'] . '_sanitize_select',
					'section'  => $obj['prefix'] . '-option-section-01',
					'options'  => array(
						__( 'Option 1', $obj['lang'] ),
						__( 'Option 2', $obj['lang'] ),
						__( 'Option 3', $obj['lang'] )
					)
				),
				$obj['prefix'] . '-option-radio' => array(
					'label'    => __( 'Radio', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'radio',
					'validate' => $obj['prefix'] . '_sanitize_radio',
					'section'  => $obj['prefix'] . '-option-section-02',
					'options'  => array(
						$obj['prefix'] . '-option-radio01' => array(
							'label'   => __( 'Radio 01', $obj['lang'] ),
							'default' => false
						),
						$obj['prefix'] . '-option-radio02' => array(
							'label'   => __( 'Radio 02', $obj['lang'] ),
							'default' => true
						),
						$obj['prefix'] . '-option-radio03' => array(
							'label'   => __( 'Radio 03', $obj['lang'] ),
							'default' => false
						)
					)
				),
				$obj['prefix'] . '-option-checkbox' => array(
					'label'    => __( 'Checkbox', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'section'  => $obj['prefix'] . '-option-section-02',
					'value'    => 1
				),
				$obj['prefix'] . '-option-multicheck' => array(
					'label'    => __( 'Multiple Checkboxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'section'  => $obj['prefix'] . '-option-section-02',
					'value'    => 1,
					'options'  => array(
						$obj['prefix'] . '-option-multicheck01' => array(
							'label' => __( 'Multi Check 01', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multicheck02' => array(
							'label' => __( 'Multi Check 02', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multicheck03' => array(
							'label' => __( 'Multi Check 03', $obj['lang'] )
						),
						$obj['prefix'] . '-option-multicheck04' => array(
							'label' => __( 'Multi Check 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-option-date' => array(
					'label'    => __( 'Date', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'date',
					'validate' => $obj['prefix'] . '_sanitize_date',
					'section'  => $obj['prefix'] . '-option-section-02'
				),
				$obj['prefix'] . '-option-color' => array(
					'label'    => __( 'Color Picker', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'color',
					'validate' => $obj['prefix'] . '_sanitize_hex',
					'section'  => $obj['prefix'] . '-option-section-02'
				),
				$obj['prefix'] . '-option-media' => array(
					'label'    => __( 'Media Library', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'media',
					'validate' => 'esc_url',
					'section'  => $obj['prefix'] . '-option-section-02'
				)
			)
		)
	);
