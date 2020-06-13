<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Post array for all sections and fields
	$post_meta_fields = array(
		$obj['prefix'] . '-post-meta-box01' => array(
			'title'    => __( 'Custom meta box 1', $obj['lang'] ),
			'page'     => $obj['prefix'] . '-post-type',
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				$obj['prefix'] . '-post-text' => array(
					'label'    => __( 'Text box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'validate' => $obj['prefix'] . '_sanitize_html'
				),
				$obj['prefix'] . '-post-url' => array(
					'label'    => __( 'URL', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'url',
					'validate' => 'esc_url'
				),
				$obj['prefix'] . '-post-multitext' => array(
					'label'    => __( 'Multiple Text Boxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_html',
					'options'  => array(
						$obj['prefix'] . '-post-multitext01' => array(
							'label' => __( 'Multi Text 01', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multitext02' => array(
							'label' => __( 'Multi Text 02', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multitext03' => array(
							'label' => __( 'Multi Text 03', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multitext04' => array(
							'label' => __( 'Multi Text 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-post-textarea' => array(
					'label'    => __( 'Textarea', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'textarea',
					'validate' => $obj['prefix'] . '_sanitize_textarea'
				),
				$obj['prefix'] . '-post-select' => array(
					'label'    => __( 'Select Box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'select',
					'validate' => $obj['prefix'] . '_sanitize_select',
					'options'  => array(
						__( 'Option 1', $obj['lang'] ),
						__( 'Option 2', $obj['lang'] ),
						__( 'Option 3', $obj['lang'] )
					)
				)
			)
		),
		$obj['prefix'] . '-post-meta-box02' => array(
			'title'    => __( 'Custom meta box 2', $obj['lang'] ),
			'page'     => $obj['prefix'] . '-post-type',
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				$obj['prefix'] . '-post-radio' => array(
					'label'    => __( 'Radio', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'radio',
					'validate' => $obj['prefix'] . '_sanitize_radio',
					'options'  => array(
						$obj['prefix'] . '-post-radio01' => array(
							'label'   => __( 'Radio 01', $obj['lang'] ),
							'default' => false
						),
						$obj['prefix'] . '-post-radio02' => array(
							'label'   => __( 'Radio 02', $obj['lang'] ),
							'default' => true
						),
						$obj['prefix'] . '-post-radio03' => array(
							'label'   => __( 'Radio 03', $obj['lang'] ),
							'default' => false
						)
					)
				),
				$obj['prefix'] . '-post-checkbox' => array(
					'label'    => __( 'Checkbox', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1
				),
				$obj['prefix'] . '-post-multicheck' => array(
					'label'    => __( 'Multiple Checkboxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'multi'    => true,
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1,
					'options'  => array(
						$obj['prefix'] . '-post-multicheck01' => array(
							'label' => __( 'Multi Check 01', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multicheck02' => array(
							'label' => __( 'Multi Check 02', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multicheck03' => array(
							'label' => __( 'Multi Check 03', $obj['lang'] )
						),
						$obj['prefix'] . '-post-multicheck04' => array(
							'label' => __( 'Multi Check 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-post-date' => array(
					'label'    => __( 'Date', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'date',
					'validate' => $obj['prefix'] . '_sanitize_date'
				),
				$obj['prefix'] . '-post-color' => array(
					'label'    => __( 'Color Picker', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'color',
					'validate' => $obj['prefix'] . '_sanitize_hex'
				),
				$obj['prefix'] . '-post-media' => array(
					'label'    => __( 'Media Library', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'media',
					'validate' => 'esc_url'
				)
			)
		)
	);
