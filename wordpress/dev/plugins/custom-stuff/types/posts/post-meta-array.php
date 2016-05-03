<?php 

    $postMetaBoxes = array();
 
    $postMetaBoxes[] = array(
        'id'       => 'cstmstff-metabox01',
        'title'    => 'Custom meta box 1',
        'page'     => 'cstmstff-post-type',
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label'    => 'Text box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-text',
                'name'     => '_cstmstff-text',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html'
            ),
            array(
                'label'    => 'URL',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-url',
                'name'     => '_cstmstff-url',
                'type'     => 'url',
                'validate' => 'esc_url'
            ), 
            array(
                'label'    => 'Multiple Text Boxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-multitext',
                'type'     => 'multitext',
                'validate' => 'cstmstff_sanitize_html',
                'options'  => array(
                    array(
                        'label' => 'Multi Text 01', 
                        'id'    => '_cstmstff-multitext01', 
                        'name'  => '_cstmstff-multitext01'
                    ),
                    array(
                        'label' => 'Multi Text 02', 
                        'id'    => '_cstmstff-multitext02', 
                        'name'  => '_cstmstff-multitext02'
                    ),
                    array(
                        'label' => 'Multi Text 03', 
                        'id'    => '_cstmstff-multitext03', 
                        'name'  => '_cstmstff-multitext03'
                    ),
                    array(
                        'label' => 'Multi Text 04', 
                        'id'    => '_cstmstff-multitext04', 
                        'name'  => '_cstmstff-multitext04'
                    )
                )
            ),                             
            array(
                'label'    => 'Textarea',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-textarea',
                'name'     => '_cstmstff-textarea',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_html'
            ),
            array(
                'label'    => 'Select Box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-select',
                'name'     => '_cstmstff-select',
                'type'     => 'select',
                'validate' => 'sanitize_text_field',
                'options'  => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                )                
            )
        )
    );

    $postMetaBoxes[] = array(
        'id'       => 'cstmstff-metabox02',
        'title'    => 'Custom meta box 2',
        'page'     => 'cstmstff-post-type',
        'context'  => 'normal',
        'priority' => 'high',
        'fields'   => array(
            array(
                'label'    => 'Radio',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-radio',
                'name'     => '_cstmstff-radio',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'options'  => array(
                    array(
                        'label'   => 'Name 1', 
                        'id'      => '_cstmstff-value01', 
                        'name'    => '_cstmstff-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id'    => '_cstmstff-value02',
                        'name'  => '_cstmstff-value02',
                    )
                )
            ),
            array(
                'label'    => 'Checkbox',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-checkbox',
                'name'     => '_cstmstff-checkbox',
                'type'     => 'checkbox',
                'value'    => 'true',
                'validate' => 'sanitize_text_field',
            ),
            array(
                'label'    => 'Multiple Checkboxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-multicheck',
                'type'     => 'multicheck',
                'validate' => 'sanitize_text_field',
                'options'  => array(
                    array(
                        'label' => 'Multi Check 01', 
                        'value' => 'true', 
                        'id'    => '_cstmstff-multicheck01', 
                        'name'  => '_cstmstff-multicheck01'
                    ),
                    array(
                        'label' => 'Multi Check 02', 
                        'value' => 'true', 
                        'id'    => '_cstmstff-multicheck02', 
                        'name'  => '_cstmstff-multicheck02'
                    ),
                    array(
                        'label' => 'Multi Check 03', 
                        'value' => 'true', 
                        'id'    => '_cstmstff-multicheck03', 
                        'name'  => '_cstmstff-multicheck03'
                    ),
                    array(
                        'label' => 'Multi Check 04', 
                        'value' => 'true', 
                        'id'    => '_cstmstff-multicheck04', 
                        'name'  => '_cstmstff-multicheck04'
                    )                                        
                )                
            ),
            array(
                'label'    => 'Date',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-date',
                'name'     => '_cstmstff-date',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date'
            ),                          
            array(
                'label'    => 'Color Picker',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-color',
                'name'     => '_cstmstff-color',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex'
            ),
            array(
                'label'    => 'Media Library',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-image',
                'name'     => '_cstmstff-image',
                'type'     => 'media',
                'validate' => 'esc_url'
            ),
            array(
                'label'    => 'WordPress Editor',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => '_cstmstff-editor',
                'name'     => '_cstmstff-editor',
                'type'     => 'editor',
                'validate' => 'wp_kses_post'
            )
        )
    );