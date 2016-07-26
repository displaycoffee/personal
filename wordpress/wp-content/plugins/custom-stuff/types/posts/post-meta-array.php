<?php 
    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;

    // Post array for all sections and fields
    $postMetaBoxes = array();
 
    $postMetaBoxes[] = array(
        'id'       => 'cstmstff-metabox01',
        'title'    => __( 'Custom meta box 1', 'custom-stuff' ),
        'page'     => 'cstmstff-post-type',
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label'    => __( 'Text box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-text',
                'name'     => '_cstmstff-text',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html'
            ),
            array(
                'label'    => __( 'URL', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-url',
                'name'     => '_cstmstff-url',
                'type'     => 'url',
                'validate' => 'esc_url'
            ), 
            array(
                'label'    => __( 'Multiple Text Boxes', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-multitext',
                'type'     => 'multitext',
                'validate' => 'cstmstff_sanitize_html',
                'options'  => array(
                    array(
                        'label' => __( 'Multi Text 01', 'custom-stuff' ), 
                        'id'    => '_cstmstff-multitext01', 
                        'name'  => '_cstmstff-multitext01'
                    ),
                    array(
                        'label' => __( 'Multi Text 02', 'custom-stuff' ), 
                        'id'    => '_cstmstff-multitext02', 
                        'name'  => '_cstmstff-multitext02'
                    ),
                    array(
                        'label' => __( 'Multi Text 03', 'custom-stuff' ), 
                        'id'    => '_cstmstff-multitext03', 
                        'name'  => '_cstmstff-multitext03'
                    ),
                    array(
                        'label' => __( 'Multi Text 04', 'custom-stuff' ), 
                        'id'    => '_cstmstff-multitext04', 
                        'name'  => '_cstmstff-multitext04'
                    )
                )
            ),                             
            array(
                'label'    => __( 'Textarea', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-textarea',
                'name'     => '_cstmstff-textarea',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_textarea'
            ),
            array(
                'label'    => __( 'Select Box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-select',
                'name'     => '_cstmstff-select',
                'type'     => 'select',
                'validate' => 'cstmstff_sanitize_select',
                'options'  => cstmstff_select_choices()                
            )
        )
    );

    $postMetaBoxes[] = array(
        'id'       => 'cstmstff-metabox02',
        'title'    => __( 'Custom meta box 2', 'custom-stuff' ),
        'page'     => 'cstmstff-post-type',
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label'    => __( 'Radio', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-radio',
                'name'     => '_cstmstff-radio',
                'type'     => 'radio',
                'validate' => 'cstmstff_sanitize_post_radio',
                'options'  => cstmstff_post_radio_choices()
            ),
            array(
                'label'    => __( 'Checkbox', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-checkbox',
                'name'     => '_cstmstff-checkbox',
                'type'     => 'checkbox',
                'value'    => 1,
                'validate' => 'cstmstff_sanitize_checkbox',
            ),
            array(
                'label'    => __( 'Multiple Checkboxes', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-multicheck',
                'type'     => 'multicheck',
                'validate' => 'cstmstff_sanitize_checkbox',
                'options'  => array(
                    array(
                        'label' => __( 'Multi Check 01', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => '_cstmstff-multicheck01', 
                        'name'  => '_cstmstff-multicheck01'
                    ),
                    array(
                        'label' => __( 'Multi Check 02', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => '_cstmstff-multicheck02', 
                        'name'  => '_cstmstff-multicheck02'
                    ),
                    array(
                        'label' => __( 'Multi Check 03', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => '_cstmstff-multicheck03', 
                        'name'  => '_cstmstff-multicheck03'
                    ),
                    array(
                        'label' => __( 'Multi Check 04', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => '_cstmstff-multicheck04', 
                        'name'  => '_cstmstff-multicheck04'
                    )                                        
                )                
            ),
            array(
                'label'    => __( 'Date', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-date',
                'name'     => '_cstmstff-date',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date'
            ),                          
            array(
                'label'    => __( 'Color Picker', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-color',
                'name'     => '_cstmstff-color',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex'
            ),
            array(
                'label'    => __( 'Media Library', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-image',
                'name'     => '_cstmstff-image',
                'type'     => 'media',
                'validate' => 'esc_url'
            ),
            array(
                'label'    => __( 'WordPress Editor', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => '_cstmstff-editor',
                'name'     => '_cstmstff-editor',
                'type'     => 'editor',
                'validate' => 'wp_kses_post'
            )
        )
    );