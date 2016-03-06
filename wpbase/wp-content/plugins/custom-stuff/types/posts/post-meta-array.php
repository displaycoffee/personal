<?php 

    $postMetaBoxes = array();
 
    $postMetaBoxes[] = array(
        'id' => 'xyz-metabox01',
        'title' => 'Custom meta box 1',
        'page' => 'xyz-post-type',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => 'Text box',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-text',
                'name' => '_xyz-text',
                'type' => 'text',
                'validate' => 'xyz_sanitize_html'
            ),
            array(
                'label' => 'URL',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-url',
                'name' => '_xyz-url',
                'type' => 'url',
                'validate' => 'esc_url'
            ), 
            array(
                'label' => 'Multiple Text Boxes',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-multitext',
                'type' => 'multitext',
                'options' => array(
                    array(
                        'label' => 'Multi Text 01', 
                        'id' => '_xyz-multitext01', 
                        'name' => '_xyz-multitext01'
                    ),
                    array(
                        'label' => 'Multi Text 02', 
                        'id' => '_xyz-multitext02', 
                        'name' => '_xyz-multitext02'
                    ),
                    array(
                        'label' => 'Multi Text 03', 
                        'id' => '_xyz-multitext03', 
                        'name' => '_xyz-multitext03'
                    ),
                    array(
                        'label' => 'Multi Text 04', 
                        'id' => '_xyz-multitext04', 
                        'name' => '_xyz-multitext04'
                    )
                ),
                'validate' => 'xyz_sanitize_html'
            ),                             
            array(
                'label' => 'Textarea',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-textarea',
                'name' => '_xyz-textarea',
                'type' => 'textarea',
                'validate' => 'xyz_sanitize_html'
            ),
            array(
                'label' => 'Select Box',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-select',
                'name' => '_xyz-select',
                'type' => 'select',
                'options' => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                ),
                'validate' => 'sanitize_text_field'
            )
        )
    );

    $postMetaBoxes[] = array(
        'id' => 'xyz-metabox02',
        'title' => 'Custom meta box 2',
        'page' => 'xyz-post-type',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => 'Radio',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-radio',
                'name' => '_xyz-radio',
                'type' => 'radio',
                'options' => array(
                    array(
                        'label' => 'Name 1', 
                        'id' => '_xyz-value01', 
                        'name' => '_xyz-value01',
                        'default' => 'yes'
                    ),
                    array(
                        'label' => 'Name 2', 
                        'id' => '_xyz-value02',
                        'name' => '_xyz-value02',
                    )
                ),
                'validate' => 'sanitize_text_field'
            ),
            array(
                'label' => 'Checkbox',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-checkbox',
                'name' => '_xyz-checkbox',
                'type' => 'checkbox',
                'value' => 'true',
                'validate' => 'sanitize_text_field',
            ),
            array(
                'label' => 'Multiple Checkboxes',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-multicheck',
                'type' => 'multicheck',
                'options' => array(
                    array(
                        'label' => 'Multi Check 01', 
                        'value' => 'true', 
                        'id' => '_xyz-multicheck01', 
                        'name' => '_xyz-multicheck01'
                    ),
                    array(
                        'label' => 'Multi Check 02', 
                        'value' => 'true', 
                        'id' => '_xyz-multicheck02', 
                        'name' => '_xyz-multicheck02'
                    ),
                    array(
                        'label' => 'Multi Check 03', 
                        'value' => 'true', 
                        'id' => '_xyz-multicheck03', 
                        'name' => '_xyz-multicheck03'
                    ),
                    array(
                        'label' => 'Multi Check 04', 
                        'value' => 'true', 
                        'id' => '_xyz-multicheck04', 
                        'name' => '_xyz-multicheck04'
                    )                                        
                ),
                'validate' => 'sanitize_text_field'
            ),
            array(
                'label' => 'Date',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-date',
                'name' => '_xyz-date',
                'type' => 'date',
                'validate' => 'xyz_sanitize_date'
            ),                          
            array(
                'label' => 'Color Picker',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-color',
                'name' => '_xyz-color',
                'type' => 'color',
                'validate' => 'xyz_sanitize_hex'
            ),
            array(
                'label' => 'Media Library',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-image',
                'name' => '_xyz-image',
                'type' => 'media',
                'validate' => 'esc_url'
            ),
            array(
                'label' => 'WordPress Editor',
                'desc' => 'Enter something here if you want. If not, just remove it.',
                'id' => '_xyz-editor',
                'name' => '_xyz-editor',
                'type' => 'editor',
                'validate' => 'wp_kses_post'
            )
        )
    );