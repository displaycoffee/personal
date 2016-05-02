<?php 

    $termMetaBoxes = array();
 
    $termMetaBoxes[] = array(
        'category' => 'xyz-cat-public',
        'fields'   => array(           
            array(
                'label'    => 'Text box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-text',
                'name'     => 'xyz-text',
                'type'     => 'text',
                'validate' => 'xyz_sanitize_html',
                'column'   => 'yes'
            ),
            array(
                'label'    => 'URL',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-url',
                'name'     => 'xyz-url',
                'type'     => 'url',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => 'Multiple Text Boxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-multitext',
                'type'     => 'multitext',
                'validate' => 'xyz_sanitize_html',
                'column'   => 'no',
                'options'  => array(
                    array(
                        'label' => 'Multi Text 01', 
                        'id'    => 'xyz-multitext01', 
                        'name'  => 'xyz-multitext01'
                    ),
                    array(
                        'label' => 'Multi Text 02', 
                        'id'    => 'xyz-multitext02', 
                        'name'  => 'xyz-multitext02'
                    ),
                    array(
                        'label' => 'Multi Text 03', 
                        'id'    => 'xyz-multitext03', 
                        'name'  => 'xyz-multitext03'
                    ),
                    array(
                        'label' => 'Multi Text 04', 
                        'id'    => 'xyz-multitext04', 
                        'name'  => 'xyz-multitext04'
                    )
                )
            ),                                                 
            array(
                'desc'     => 'Textarea',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-textarea',
                'name'     => 'xyz-textarea',
                'type'     => 'textarea',
                'validate' => 'xyz_sanitize_html',
                'column'   => 'no'
            ),
            array(
                'desc'     => 'Select Box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-select',
                'name'     => 'xyz-select',
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
                'id'       => 'xyz-radio',
                'name'     => 'xyz-radio',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'column'   => 'yes',                
                'options'  => array(
                    array(
                        'label'   => 'Name 1', 
                        'id'      => 'xyz-value01', 
                        'name'    => 'xyz-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id'    => 'xyz-value02',
                        'name'  => 'xyz-value02',
                    )
                )
            ),
            array(
                'desc'     => 'Checkbox',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-checkbox',
                'name'     => 'xyz-checkbox',
                'type'     => 'checkbox',
                'value'    => 'true',
                'validate' => 'sanitize_text_field',
                'column'   => 'yes'
            ), 
            array(
                'desc'     => 'Multiple Checkboxes',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-multicheck',
                'type'     => 'multicheck',
                'validate' => 'sanitize_text_field',
                'column'   => 'no',                
                'options'  => array(
                    array(
                        'label' => 'Multi Check 01', 
                        'value' => 'true', 
                        'id'    => 'xyz-multicheck01', 
                        'name'  => 'xyz-multicheck01'
                    ),
                    array(
                        'label' => 'Multi Check 02', 
                        'value' => 'true', 
                        'id'    => 'xyz-multicheck02', 
                        'name'  => 'xyz-multicheck02'
                    ),
                    array(
                        'label' => 'Multi Check 03', 
                        'value' => 'true', 
                        'id'    => 'xyz-multicheck03', 
                        'name'  => 'xyz-multicheck03'
                    ),
                    array(
                        'label' => 'Multi Check 04', 
                        'value' => 'true', 
                        'id'    => 'xyz-multicheck04', 
                        'name'  => 'xyz-multicheck04'
                    )                                        
                )
            ), 
            array(
                'desc'     => 'Date',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-date',
                'name'     => 'xyz-date',
                'type'     => 'date',
                'validate' => 'xyz_sanitize_date',
                'column'   => 'no'
            ),                                 
            array(
                'label'    => 'Color Picker',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-color',
                'name'     => 'xyz-color',
                'type'     => 'color',
                'validate' => 'xyz_sanitize_hex',
                'column'   => 'no'
            ),
            array(
                'label'    => 'Media Library',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-image',
                'name'     => 'xyz-image',
                'type'     => 'media',
                'validate' => 'esc_url',
                'column'   => 'no'
            ),
            array(
                'label'    => 'WordPress Editor',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-editor',
                'name'     => 'xyz-editor',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'column'   => 'no'
            )            
        )
    );