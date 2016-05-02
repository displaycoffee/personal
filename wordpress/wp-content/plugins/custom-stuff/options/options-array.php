<?php 
   
    $optionPages = array();
 
    $optionPages[] = array(
        'slug'          => 'edit.php?post_type=xyz-post-type',
        'title'         => 'Options Page',
        'capability'    => 'manage_options',
        'menu-slug'     => 'xyz-options.php',
        'options-group' => 'xyz-options',
        'fields'        => array(
            array(
                'id'    => 'xyz-option-section-01',
                'title' => 'Section 01',
                'desc'  => '<p>Text for Section 01.</p>',
                'type'  => 'section'
            ),
            array(
                'id'    => 'xyz-option-section-02',
                'title' => 'Section 02',
                'desc'  => '<p>Text for Section 02.</p>',
                'type'  => 'section'
            ),            
            array(
                'label'    => 'Text box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-text',
                'name'     => 'xyz-options[xyz-text]',
                'type'     => 'text',
                'validate' => 'xyz_sanitize_html',
                'section'  => 'xyz-option-section-01'
            ),
            array(
                'label'    => 'URL',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-url',
                'name'     => 'xyz-options[xyz-url]',
                'type'     => 'url',
                'validate' => 'esc_url',
                'section'  => 'xyz-option-section-01'
            ),                                    
            array(
                'label'    => 'Textarea',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-textarea',
                'name'     => 'xyz-options[xyz-textarea]',
                'type'     => 'textarea',
                'validate' => 'xyz_sanitize_html',
                'section'  => 'xyz-option-section-01'
            ),
            array(
                'label'    => 'Select Box',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-select',
                'name'     => 'xyz-options[xyz-select]',
                'type'     => 'select',
                'validate' => 'sanitize_text_field',
                'section'  => 'xyz-option-section-01',
                'options'  => array(
                    'Option 1', 
                    'Option 2', 
                    'Option 3'
                )
            ),
            array(
                'label'    => 'Radio',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-radio',
                'name'     => 'xyz-options[xyz-radio]',
                'type'     => 'radio',
                'validate' => 'sanitize_text_field',
                'section'  => 'xyz-option-section-02',                
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
                'label'    => 'Checkbox',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-checkbox',
                'name'     => 'xyz-options[xyz-checkbox]',
                'type'     => 'checkbox',
                'value'    => 'true',
                'validate' => 'sanitize_text_field',
                'section'  => 'xyz-option-section-02'
            ), 
            array(
                'label'    => 'Date',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-date',
                'name'     => 'xyz-options[xyz-date]',
                'type'     => 'date',
                'validate' => 'xyz_sanitize_date',
                'section'  => 'xyz-option-section-02'
            ),                     
            array(
                'label'    => 'Color Picker',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-color',
                'name'     => 'xyz-options[xyz-color]',
                'type'     => 'color',
                'validate' => 'xyz_sanitize_hex',
                'section'  => 'xyz-option-section-02'
            ),
            array(
                'label'    => 'Media Library',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-image',
                'name'     => 'xyz-options[xyz-image]',
                'type'     => 'media',
                'validate' => 'esc_url',
                'section'  => 'xyz-option-section-02'
            ),
            array(
                'label'    => 'WordPress Editor',
                'desc'     => 'Enter something here if you want. If not, just remove it.',
                'id'       => 'xyz-editor',
                'name'     => 'xyz-options[xyz-editor]',
                'type'     => 'editor',
                'validate' => 'wp_kses_post',
                'section'  => 'xyz-option-section-02'
            )             
        )
    );