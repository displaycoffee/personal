<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Term array for all sections and fields
	$term_meta_fields = array(
		$obj['prefix'] . '-term-meta-box01' => array(
			'category' => $obj['prefix'] . '-taxonomy-public',
			'fields'   => array(
				$obj['prefix'] . '-term-text' => array(
					'label'    => __( 'Text box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'validate' => $obj['prefix'] . '_sanitize_html',
					'column'   => true
				),
				$obj['prefix'] . '-term-url' => array(
					'label'    => __( 'URL', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'url',
					'validate' => 'esc_url',
					'column'   => false
				),
				$obj['prefix'] . '-term-multitext' => array(
					'label'    => __( 'Multiple Text Boxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_html',
					'column'   => false,
					'options'  => array(
						$obj['prefix'] . '-term-multitext01' => array(
							'label' => __( 'Multi Text 01', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multitext02' => array(
							'label' => __( 'Multi Text 02', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multitext03' => array(
							'label' => __( 'Multi Text 03', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multitext04' => array(
							'label' => __( 'Multi Text 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-term-textarea' => array(
					'label'    => __( 'Textarea', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'textarea',
					'validate' => $obj['prefix'] . '_sanitize_textarea',
					'column'   => false
				),
				$obj['prefix'] . '-term-select' => array(
					'label'    => __( 'Select Box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'select',
					'validate' => $obj['prefix'] . '_sanitize_select',
					'column'   => true,
					'options'  => array(
						__( 'Option 1', $obj['lang'] ),
						__( 'Option 2', $obj['lang'] ),
						__( 'Option 3', $obj['lang'] )
					)
				),
				$obj['prefix'] . '-term-radio' => array(
					'label'    => __( 'Radio', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'radio',
					'validate' => $obj['prefix'] . '_sanitize_radio',
					'column'   => true,
					'options'  => array(
						$obj['prefix'] . '-term-radio01' => array(
							'label'   => __( 'Radio 01', $obj['lang'] ),
							'default' => false
						),
						$obj['prefix'] . '-term-radio02' => array(
							'label'   => __( 'Radio 02', $obj['lang'] ),
							'default' => true
						),
						$obj['prefix'] . '-term-radio03' => array(
							'label'   => __( 'Radio 03', $obj['lang'] ),
							'default' => false
						)
					)
				),
				$obj['prefix'] . '-term-checkbox' => array(
					'label'    => __( 'Checkbox', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1,
					'column'   => true
				),
				$obj['prefix'] . '-term-multicheck' => array(
					'label'    => __( 'Multiple Checkboxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1,
					'column'   => false,
					'options'  => array(
						$obj['prefix'] . '-term-multicheck01' => array(
							'label' => __( 'Multi Check 01', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multicheck02' => array(
							'label' => __( 'Multi Check 02', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multicheck03' => array(
							'label' => __( 'Multi Check 03', $obj['lang'] )
						),
						$obj['prefix'] . '-term-multicheck04' => array(
							'label' => __( 'Multi Check 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-term-date' => array(
					'label'    => __( 'Date', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'date',
					'validate' => $obj['prefix'] . '_sanitize_date',
					'column'   => false
				),
				$obj['prefix'] . '-term-color' => array(
					'label'    => __( 'Color Picker', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'color',
					'validate' => $obj['prefix'] . '_sanitize_hex',
					'column'   => false
				),
				$obj['prefix'] . '-term-media' => array(
					'label'    => __( 'Media Library', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'media',
					'validate' => 'esc_url',
					'column'   => false
				)
			)
		)
	);
