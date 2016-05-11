<?php 
    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
    
    // Term array for all sections and fields
    $termMetaBoxes = array();
 
    $termMetaBoxes[] = array(
        'category' => 'cstmstff-cat-public',
        'fields'   => array(           
            array(
                'label'    => __( 'Text box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-text',
                'name'     => 'cstmstff-text',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'yes'
            ),
            array(
                'label'    => __( 'URL', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-url',
                'name'     => 'cstmstff-url',
                'type'     => 'url',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => __( 'Multiple Text Boxes', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-multitext',
                'type'     => 'multitext',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'no',
                'options'  => array(
                    array(
                        'label' => __( 'Multi Text 01', 'custom-stuff' ), 
                        'id'    => 'cstmstff-multitext01', 
                        'name'  => 'cstmstff-multitext01'
                    ),
                    array(
                        'label' => __( 'Multi Text 02', 'custom-stuff' ), 
                        'id'    => 'cstmstff-multitext02', 
                        'name'  => 'cstmstff-multitext02'
                    ),
                    array(
                        'label' => __( 'Multi Text 03', 'custom-stuff' ), 
                        'id'    => 'cstmstff-multitext03', 
                        'name'  => 'cstmstff-multitext03'
                    ),
                    array(
                        'label' => __( 'Multi Text 04', 'custom-stuff' ), 
                        'id'    => 'cstmstff-multitext04', 
                        'name'  => 'cstmstff-multitext04'
                    )
                )
            ),                                                 
            array(
                'label'    => __( 'Textarea', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-textarea',
                'name'     => 'cstmstff-textarea',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'no'
            ),
            array(
                'label'    => __( 'Select Box', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-select',
                'name'     => 'cstmstff-select',
                'type'     => 'select',
                'validate' => 'cstmstff_sanitize_select',
                'column'   => 'yes',                
                'options'  => cstmstff_select_choices()
            ),
            array(
                'label'    => __( 'Radio', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-radio',
                'name'     => 'cstmstff-radio',
                'type'     => 'radio',
                'validate' => 'cstmstff_sanitize_other_radio',
                'column'   => 'yes',                
                'options'  => cstmstff_other_radio_choices()
            ),
            array(
                'label'    => __( 'Checkbox', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-checkbox',
                'name'     => 'cstmstff-checkbox',
                'type'     => 'checkbox',
                'value'    => 1,
                'validate' => 'cstmstff_sanatize_checkbox',
                'column'   => 'yes'
            ), 
            array(
                'label'    => __( 'Multiple Checkboxes', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-multicheck',
                'type'     => 'multicheck',
                'validate' => 'cstmstff_sanatize_checkbox',
                'column'   => 'no',                
                'options'  => array(
                    array(
                        'label' => __( 'Multi Check 01', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => 'cstmstff-multicheck01', 
                        'name'  => 'cstmstff-multicheck01'
                    ),
                    array(
                        'label' => __( 'Multi Check 02', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => 'cstmstff-multicheck02', 
                        'name'  => 'cstmstff-multicheck02'
                    ),
                    array(
                        'label' => __( 'Multi Check 03', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => 'cstmstff-multicheck03', 
                        'name'  => 'cstmstff-multicheck03'
                    ),
                    array(
                        'label' => __( 'Multi Check 04', 'custom-stuff' ), 
                        'value' => 1, 
                        'id'    => 'cstmstff-multicheck04', 
                        'name'  => 'cstmstff-multicheck04'
                    )                                        
                )
            ), 
            array(
                'label'    => __( 'Date', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-date',
                'name'     => 'cstmstff-date',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date',
                'column'   => 'no'
            ),                                 
            array(
                'label'    => __( 'Color Picker', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-color',
                'name'     => 'cstmstff-color',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex',
                'column'   => 'no'
            ),
            array(
                'label'    => __( 'Media Library', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-image',
                'name'     => 'cstmstff-image',
                'type'     => 'media',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => __( 'WordPress Editor', 'custom-stuff' ),
                'desc'     => __( 'Enter something here if you want. If not, just remove it.', 'custom-stuff' ),
                'id'       => 'cstmstff-editor',
                'name'     => 'cstmstff-editor',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'column'   => 'no'
            )            
        )
    );