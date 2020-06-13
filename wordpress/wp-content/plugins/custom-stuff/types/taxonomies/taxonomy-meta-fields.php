<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Taxonomy array for all sections and fields
	$taxonomy_meta_fields = array(
		$obj['prefix'] . '-taxonomy-meta-box01' => array(
			'category' => $obj['prefix'] . '-taxonomy-public',
			'fields'   => array(
				$obj['prefix'] . '-taxonomy-text' => array(
					'label'    => __( 'Text box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'validate' => $obj['prefix'] . '_sanitize_html',
					'column'   => 'yes'
				),
				$obj['prefix'] . '-taxonomy-url' => array(
					'label'    => __( 'URL', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'url',
					'validate' => 'esc_url',
					'column'   => 'no'
				),
				$obj['prefix'] . '-taxonomy-multitext' => array(
					'label'    => __( 'Multiple Text Boxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_html',
					'column'   => 'no',
					'options'  => array(
						$obj['prefix'] . '-taxonomy-multitext01' => array(
							'label' => __( 'Multi Text 01', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multitext02' => array(
							'label' => __( 'Multi Text 02', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multitext03' => array(
							'label' => __( 'Multi Text 03', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multitext04' => array(
							'label' => __( 'Multi Text 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-taxonomy-textarea' => array(
					'label'    => __( 'Textarea', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'textarea',
					'validate' => $obj['prefix'] . '_sanitize_textarea',
					'column'   => 'no'
				),
				$obj['prefix'] . '-taxonomy-select' => array(
					'label'    => __( 'Select Box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'select',
					'validate' => $obj['prefix'] . '_sanitize_select',
					'column'   => 'yes',
					'options'  => array(
						__( 'Option 1', $obj['lang'] ),
						__( 'Option 2', $obj['lang'] ),
						__( 'Option 3', $obj['lang'] )
					)
				),
				$obj['prefix'] . '-taxonomy-radio' => array(
					'label'    => __( 'Radio', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'radio',
					'validate' => $obj['prefix'] . '_sanitize_radio',
					'column'   => 'yes',
					'options'  => array(
						$obj['prefix'] . '-taxonomy-radio01' => array(
							'label'   => __( 'Radio 01', $obj['lang'] ),
							'default' => false
						),
						$obj['prefix'] . '-taxonomy-radio02' => array(
							'label'   => __( 'Radio 02', $obj['lang'] ),
							'default' => true
						),
						$obj['prefix'] . '-taxonomy-radio03' => array(
							'label'   => __( 'Radio 03', $obj['lang'] ),
							'default' => false
						)
					)
				),
				$obj['prefix'] . '-taxonomy-checkbox' => array(
					'label'    => __( 'Checkbox', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1,
					'column'   => 'yes'
				),
				$obj['prefix'] . '-taxonomy-multicheck' => array(
					'label'    => __( 'Multiple Checkboxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1,
					'column'   => 'no',
					'options'  => array(
						$obj['prefix'] . '-taxonomy-multicheck01' => array(
							'label' => __( 'Multi Check 01', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multicheck02' => array(
							'label' => __( 'Multi Check 02', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multicheck03' => array(
							'label' => __( 'Multi Check 03', $obj['lang'] )
						),
						$obj['prefix'] . '-taxonomy-multicheck04' => array(
							'label' => __( 'Multi Check 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-taxonomy-date' => array(
					'label'    => __( 'Date', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'date',
					'validate' => $obj['prefix'] . '_sanitize_date',
					'column'   => 'no'
				),
				$obj['prefix'] . '-taxonomy-color' => array(
					'label'    => __( 'Color Picker', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'color',
					'validate' => $obj['prefix'] . '_sanitize_hex',
					'column'   => 'no'
				),
				$obj['prefix'] . '-taxonomy-media' => array(
					'label'    => __( 'Media Library', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'media',
					'validate' => 'esc_url',
					'column'   => 'no'
				)
			)
		)
	);
