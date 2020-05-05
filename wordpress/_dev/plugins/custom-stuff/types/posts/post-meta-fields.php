<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Post array for all sections and fields
	$post_meta_fields = array(
		$obj['prefix'] . '-metabox01' => array(
			'title'    => __( 'Custom meta box 1', $obj['lang'] ),
			'page'     => $obj['prefix'] . '-post-type',
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				$obj['prefix'] . '-text' => array(
					'label'    => __( 'Text box', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'text',
					'validate' => $obj['prefix'] . '_sanitize_html'
				),
				$obj['prefix'] . '-url' => array(
					'label'    => __( 'URL', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'url',
					'validate' => 'esc_url'
				),
				$obj['prefix'] . '-multitext' => array(
					'label'    => __( 'Multiple Text Boxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'multitext',
					'validate' => $obj['prefix'] . '_sanitize_html',
					'options'  => array(
						$obj['prefix'] . '-multitext01' => array(
							'label' => __( 'Multi Text 01', $obj['lang'] )
						),
						$obj['prefix'] . '-multitext02' => array(
							'label' => __( 'Multi Text 02', $obj['lang'] )
						),
						$obj['prefix'] . '-multitext03' => array(
							'label' => __( 'Multi Text 03', $obj['lang'] )
						),
						$obj['prefix'] . '-multitext04' => array(
							'label' => __( 'Multi Text 04', $obj['lang'] )
						)
					)
				),
				$obj['prefix'] . '-textarea' => array(
					'label'    => __( 'Textarea', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'textarea',
					'validate' => $obj['prefix'] . '_sanitize_textarea'
				),
				$obj['prefix'] . '-select' => array(
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
		$obj['prefix'] . '-metabox02' => array(
			'title'    => __( 'Custom meta box 2', $obj['lang'] ),
			'page'     => $obj['prefix'] . '-post-type',
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				$obj['prefix'] . '-radio' => array(
					'label'    => __( 'Radio', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'radio',
					'validate' => $obj['prefix'] . '_sanitize_post_radio',
					'options'  => array(
						$obj['prefix'] . '-radio01' => array(
							'label'   => __( 'Radio 01', $obj['lang'] ),
							'default' => false
						),
						$obj['prefix'] . '-radio02' => array(
							'label'   => __( 'Radio 02', $obj['lang'] ),
							'default' => true
						),
						$obj['prefix'] . '-radio03' => array(
							'label'   => __( 'Radio 03', $obj['lang'] ),
							'default' => false
						)
					)
				),
				$obj['prefix'] . '-checkbox' => array(
					'label'    => __( 'Checkbox', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'checkbox',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'value'    => 1
				),
				$obj['prefix'] . '-multicheck' => array(
					'label'    => __( 'Multiple Checkboxes', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'multicheck',
					'validate' => $obj['prefix'] . '_sanitize_checkbox',
					'options'  => array(
						$obj['prefix'] . '-multicheck01' => array(
							'label' => __( 'Multi Check 01', $obj['lang'] ),
							'value' => 1
						),
						$obj['prefix'] . '-multicheck02' => array(
							'label' => __( 'Multi Check 02', $obj['lang'] ),
							'value' => 1
						),
						$obj['prefix'] . '-multicheck03' => array(
							'label' => __( 'Multi Check 03', $obj['lang'] ),
							'value' => 1
						),
						$obj['prefix'] . '-multicheck04' => array(
							'label' => __( 'Multi Check 04', $obj['lang'] ),
							'value' => 1
						)
					)
				),
				$obj['prefix'] . '-date' => array(
					'label'    => __( 'Date', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'date',
					'validate' => $obj['prefix'] . '_sanitize_date'
				),
				$obj['prefix'] . '-color' => array(
					'label'    => __( 'Color Picker', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'color',
					'validate' => $obj['prefix'] . '_sanitize_hex'
				),
				$obj['prefix'] . '-media' => array(
					'label'    => __( 'Media Library', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'media',
					'validate' => 'esc_url'
				),
				$obj['prefix'] . '-editor' => array(
					'label'    => __( 'WordPress Editor', $obj['lang'] ),
					'desc'     => __( 'Enter something here if you want. If not, just remove it.', $obj['lang'] ),
					'type'     => 'editor',
					'validate' => 'wp_kses_post'
				),
			)
		),
	);
