<?php 

    $termMetaBoxes = array();
 
    $termMetaBoxes[] = array(
        'category' => 'cstmstff-cat-public',
        'fields'   => array(           
            array(
                'label'    => 'Text box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-text',
                'name'     => 'cstmstff-text',
                'type'     => 'text',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'yes'
            ),
            array(
                'label'    => 'URL',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-url',
                'name'     => 'cstmstff-url',
                'type'     => 'url',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => 'Multiple Text Boxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-multitext',
                'type'     => 'multitext',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'no',
                'options'  => array(
                    array(
                        'label' => 'Multi Text 01', 
                        'id'    => 'cstmstff-multitext01', 
                        'name'  => 'cstmstff-multitext01'
                    ),
                    array(
                        'label' => 'Multi Text 02', 
                        'id'    => 'cstmstff-multitext02', 
                        'name'  => 'cstmstff-multitext02'
                    ),
                    array(
                        'label' => 'Multi Text 03', 
                        'id'    => 'cstmstff-multitext03', 
                        'name'  => 'cstmstff-multitext03'
                    ),
                    array(
                        'label' => 'Multi Text 04', 
                        'id'    => 'cstmstff-multitext04', 
                        'name'  => 'cstmstff-multitext04'
                    )
                )
            ),                                                 
            array(
                'desc'     => 'Textarea',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-textarea',
                'name'     => 'cstmstff-textarea',
                'type'     => 'textarea',
                'validate' => 'cstmstff_sanitize_html',
                'column'   => 'no'
            ),
            array(
                'desc'     => 'Select Box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-select',
                'name'     => 'cstmstff-select',
                'type'     => 'select',
                'validate' => 'sanitize_text_field',
                'column'   => 'yes',                
                'options'  => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                )
            ),
            array(
                'desc'     => 'Radio',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-radio',
                'name'     => 'cstmstff-radio',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'column'   => 'yes',                
                'options'  => array(
                    array(
                        'label'   => 'Name 1', 
                        'id'      => 'cstmstff-value01', 
                        'name'    => 'cstmstff-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id'    => 'cstmstff-value02',
                        'name'  => 'cstmstff-value02',
                    )
                )
            ),
            array(
                'desc'     => 'Checkbox',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-checkbox',
                'name'     => 'cstmstff-checkbox',
                'type'     => 'checkbox',
                'value'    => 'true',
                'validate' => 'sanitize_text_field',
                'column'   => 'yes'
            ), 
            array(
                'desc'     => 'Multiple Checkboxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-multicheck',
                'type'     => 'multicheck',
                'validate' => 'sanitize_text_field',
                'column'   => 'no',                
                'options'  => array(
                    array(
                        'label' => 'Multi Check 01', 
                        'value' => 'true', 
                        'id'    => 'cstmstff-multicheck01', 
                        'name'  => 'cstmstff-multicheck01'
                    ),
                    array(
                        'label' => 'Multi Check 02', 
                        'value' => 'true', 
                        'id'    => 'cstmstff-multicheck02', 
                        'name'  => 'cstmstff-multicheck02'
                    ),
                    array(
                        'label' => 'Multi Check 03', 
                        'value' => 'true', 
                        'id'    => 'cstmstff-multicheck03', 
                        'name'  => 'cstmstff-multicheck03'
                    ),
                    array(
                        'label' => 'Multi Check 04', 
                        'value' => 'true', 
                        'id'    => 'cstmstff-multicheck04', 
                        'name'  => 'cstmstff-multicheck04'
                    )                                        
                )
            ), 
            array(
                'desc'     => 'Date',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-date',
                'name'     => 'cstmstff-date',
                'type'     => 'date',
                'validate' => 'cstmstff_sanitize_date',
                'column'   => 'no'
            ),                                 
            array(
                'label'    => 'Color Picker',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-color',
                'name'     => 'cstmstff-color',
                'type'     => 'color',
                'validate' => 'cstmstff_sanitize_hex',
                'column'   => 'no'
            ),
            array(
                'label'    => 'Media Library',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-image',
                'name'     => 'cstmstff-image',
                'type'     => 'media',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => 'WordPress Editor',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'cstmstff-editor',
                'name'     => 'cstmstff-editor',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'column'   => 'no'
            )            
        )
    );